<?php

namespace App\Services;

use DB;

class MattressPriceImportService
{
    public function import(array $rows, $productId)
    {
        DB::beginTransaction();

        try {

            $report = [
                'total_rows'            => count($rows),
                'processed_variants'    => 0,
                'updated_variants'      => [],
                'created_variants'      => [],
                'created_colors'        => [],
                'skipped_rows'          => [],
            ];

            /*
            |--------------------------------------------------------------------------
            | Existing Variants
            |--------------------------------------------------------------------------
            */

            $existingVariants = DB::table('map_color_sizes')
                ->where('product_id', $productId)
                ->get();

            $variantMap = [];

            foreach ($existingVariants as $variant) {

                $key = $variant->size_id . '-' . $variant->color_id;

                $variantMap[$key] = $variant;
            }

            /*
            |--------------------------------------------------------------------------
            | Existing Colors
            |--------------------------------------------------------------------------
            */

            $colors = DB::table('mst_colors')->get();

            $colorMap = [];

            foreach ($colors as $color) {

                $colorMap[strtolower(trim($color->title))] = $color->id;
            }

            /*
            |--------------------------------------------------------------------------
            | Sizes
            |--------------------------------------------------------------------------
            */

            $sizes = DB::table('mst_sizes')->get();

            $sizeMap = [];

            foreach ($sizes as $size) {

                $sizeMap[strtolower(trim($size->title))] = $size->id;
            }

            /*
            |--------------------------------------------------------------------------
            | Process Rows
            |--------------------------------------------------------------------------
            */

            foreach ($rows as $row) {

                $dimension = $this->normalizeDimension(
                    $row['dimension']
                );

                $width = $this->extractWidth($dimension);

                $sizeTitle = $this->getSizeTitle($width);

                if (!$sizeTitle) {

                    $report['skipped_rows'][] = [
                        'dimension' => $dimension,
                        'reason'    => 'Invalid size range',
                    ];

                    continue;
                }

                $sizeId = $sizeMap[
                    strtolower($sizeTitle)
                ] ?? null;

                if (!$sizeId) {

                    $report['skipped_rows'][] = [
                        'dimension' => $dimension,
                        'reason'    => 'Size not found',
                    ];

                    continue;
                }

                foreach ($row['prices'] as $thickness => $mrp) {

                    if (!$mrp) {
                        continue;
                    }

                    $report['processed_variants']++;

                    $thicknessNumber = $this->cleanThickness(
                        $thickness
                    );

                    $colorTitle = strtolower(
                        $dimension .
                        ' (' .
                        $thicknessNumber .
                        ' THICKNESS)'
                    );

                    $colorTitle = preg_replace(
                        '/\s+/',
                        ' ',
                        trim($colorTitle)
                    );

                    /*
                    |--------------------------------------------------------------------------
                    | Create Color If Missing
                    |--------------------------------------------------------------------------
                    */

                    $colorId = $colorMap[$colorTitle] ?? null;

                    if (!$colorId) {

                        $colorId = DB::table('mst_colors')
                            ->insertGetId([
                                'title'       => $colorTitle,
                                'color_code'  => '#000000',
                                'status'      => 1,
                                'created_at'  => date('Y-m-d H:i:s'),
                                'updated_at'  => date('Y-m-d H:i:s'),
                            ]);

                        $colorMap[$colorTitle] = $colorId;

                        $report['created_colors'][] = [
                            'color_id' => $colorId,
                            'title'    => $colorTitle,
                        ];
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Variant Key
                    |--------------------------------------------------------------------------
                    */

                    $variantKey = $sizeId . '-' . $colorId;

                    /*
                    |--------------------------------------------------------------------------
                    | Update Existing Variant
                    |--------------------------------------------------------------------------
                    */

                    if (isset($variantMap[$variantKey])) {

                        $variant = $variantMap[$variantKey];

                        DB::table('map_color_sizes')
                            ->where('id', $variant->id)
                            ->update([
                                'mrp'        => (int)$mrp,
                                'updated_at' => date('Y-m-d H:i:s'),
                            ]);

                        $report['updated_variants'][] = [
                            'variant_id' => $variant->id,
                            'dimension'  => $dimension,
                            'thickness'  => $thicknessNumber,
                            'size'       => $sizeTitle,
                            'old_mrp'    => $variant->mrp,
                            'new_mrp'    => (int)$mrp,
                            'color_id'   => $colorId,
                            'size_id'    => $sizeId,
                        ];

                    } else {

                        /*
                        |--------------------------------------------------------------------------
                        | Create Variant
                        |--------------------------------------------------------------------------
                        */

                        $insertId = DB::table('map_color_sizes')
                            ->insertGetId([
                                'product_id'        => $productId,
                                'color_id'          => $colorId,
                                'size_id'           => $sizeId,
                                'mrp'               => (int)$mrp,
                                'stock'             => 0,
                                'status'            => 1,
                                'gst'               => 0,
                                'starting_price'    => $mrp,
                                'buy_it_now_price'  => $mrp,
                                'discount_price'    => 0,
                                'created_at'        => date('Y-m-d H:i:s'),
                                'updated_at'        => date('Y-m-d H:i:s'),
                            ]);

                        $report['created_variants'][] = [
                            'variant_id' => $insertId,
                            'dimension'  => $dimension,
                            'thickness'  => $thicknessNumber,
                            'size'       => $sizeTitle,
                            'mrp'        => (int)$mrp,
                            'color_id'   => $colorId,
                            'size_id'    => $sizeId,
                        ];

                        $variantMap[$variantKey] = (object)[
                            'id' => $insertId
                        ];
                    }
                }
            }

            DB::commit();

            /*
            |--------------------------------------------------------------------------
            | Final Summary
            |--------------------------------------------------------------------------
            */

            $report['summary'] = [
                'total_updated_variants'
                    => count($report['updated_variants']),

                'total_created_variants'
                    => count($report['created_variants']),

                'total_created_colors'
                    => count($report['created_colors']),

                'total_skipped_rows'
                    => count($report['skipped_rows']),
            ];

            return $report;

        } catch (\Exception $e) {

            DB::rollBack();

            throw $e;
        }
    }

    private function normalizeDimension($dimension)
    {
        $dimension = strtolower(trim($dimension));

        $dimension = preg_replace(
            '/\s*x\s*/i',
            ' x ',
            $dimension
        );

        $dimension = preg_replace('/\s+/', ' ', $dimension);

        return trim($dimension);
    }

    private function extractWidth($dimension)
    {
        preg_match('/x\s*(\d+)/i', $dimension, $matches);

        return isset($matches[1])
            ? (int)$matches[1]
            : 0;
    }

    private function getSizeTitle($width)
    {
        if ($width >= 30 && $width <= 48) {
            return 'Single';
        }

        if ($width >= 60 && $width <= 66) {
            return 'Queen';
        }

        if ($width >= 72 && $width <= 84) {
            return 'King';
        }

        return null;
    }

    private function cleanThickness($thickness)
    {
        return preg_replace('/[^0-9]/', '', $thickness);
    }
}
