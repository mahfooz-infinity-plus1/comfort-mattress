<?php

namespace App\Imports;

use App\Exceptions\ImportException;
use App\Model\MapColorSize;
use App\Model\MapProductMstSize;
use App\Model\MasterWarranty;
use App\Model\MstColor;
use App\Model\MstSize;
use App\Model\TxnBrand;
use App\Model\TxnCategory;
use App\Model\TxnCondition;
use App\Model\TxnCustomField;
use App\Model\TxnImage;
use App\Model\TxnKeyword;
use App\Model\TxnMasterGst;
use App\Model\TxnMaterial;
use App\Model\TxnProduct;
use App\Model\TxnWeight;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class ProductImport implements
    ToCollection,
    WithHeadingRow,
    WithBatchInserts,
    WithChunkReading
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        $validator = Validator::make($rows->toArray()[0], [
            'category_name' => 'required|string|max:191',
            'title' => 'required|string',
            'image_url' => 'required|string',
            'image_url1' => 'required|string',
            'description' => 'required|string',
            'brand_name' => 'required|string|max:191',
            'color_name' => 'required|string',
            'mst_size_title' => 'required',
            'material_name' => 'required|string|max:191',
            'unit' => 'nullable',
            'condition' => 'nullable|string|max:50',
            'warranty_title' => 'nullable|string',
            'gst_value' => 'required|integer',
            'breadth' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'image_urls' => 'required|string',
            'keywords' => 'required|string',
            'is_cod' => 'required|numeric',
            'review_status' => 'required|numeric',
            'mrp' => 'required|numeric',
            'starting_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'sort_index' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            throw new ImportException('Validation failed', 0, null, $validator->errors()->all());
        }

        DB::beginTransaction();
        foreach ($rows as $key => $row) {

            $category = TxnCategory::firstOrCreate(
                ['name' => $row['category_name']],
                ['slug_url' => Str::slug($row['category_name'] . rand(0, 99), '-'), 'status' => true]
            );

            $brand = TxnBrand::firstOrCreate(
                ['brand_name' => $row['brand_name']],
                ['status' => true]
            );

            $material = TxnMaterial::firstOrCreate(
                ['material_name' => $row['material_name']],
                ['status' => true]
            );

            $weight = TxnWeight::firstOrCreate(
                ['unit' => $row['unit']],
                ['status' => true]
            );

            $condition = TxnCondition::firstOrCreate(
                ['condition' => $row['condition']],
                ['status' => true]
            );

            $warranty = MasterWarranty::firstOrCreate(
                ['title' => $row['warranty_title']],
                ['status' => true]
            );

            $gst = TxnMasterGst::firstOrCreate(
                ['gst_value' => $row['gst_value']],
                ['status' => true]
            );

            $color = MstColor::where('title', $row['color_name'])->first();
            if(!$color){
                throw new ImportException('Validation failed', 0, null, ['Color Does not exist!!, Please create one.']);
            }

            $size = MstSize::firstOrCreate(
                ['title' => $row['mst_size_title']],
                ['status' => true]
            );

            #Random String
            $product = TxnProduct::updateOrCreate(['title' => $row['title']],[
                'title' => $row['title'],
                'brand_id' => $brand->id,
                'material_id' => $material->id,
                'weight_unit' => $weight->id,
                'condition_id' => $condition->id,
                'description' => $row['description'],
                'length' => $row['length'],
                'breadth' => $row['breadth'],
                'height' => $row['height'],
                'weight' => $row['weight'],
                'width' => $row['width'],
                'upc' => $row['upc'],
                'category_id' => $category->id,
                'warranty_id' => $warranty->id,
                'gst_id' => $gst->id,
                'image_url' => $row['image_url'],
                'image_url1' => $row['image_url1'],
                'status' => true,
                'isCodAvailable' => $row['is_cod'],
                'review_status' => $row['review_status'],
                'within_days' => $row['within_days'],
                'wrong_products' => $row['wrong_products'],
                'faulty_products' => $row['faulty_products'],
                'quality_issue' => $row['quality_issue'],
                'slug_url' => Str::slug($category->name . '-' . $row['title'] . '-' . rand(1000, 9999), '-'),
            ]);

            if ($row['keywords']) {

                $keywords = explode(',', $row['keywords']);
                foreach ($keywords as $keyword) {
                    TxnKeyword::create([
                        'keyword' => trim($keyword, ' '),
                        'product_id' => $product->id,
                    ]);
                }
            }

            if ($row['image_urls']) {

                foreach (explode(",", $row['image_urls']) as $image) {
                    TxnImage::create([
                        'product_id' => $product->id,
                        'image_url' => $image,
                        'color_id' => $color->id,
                        'size_id' => $size->id,
                    ]);
                }
            }

            if ($color) {
                $gst_value = 1 + ($gst->gst_value / 100);

                $before_gst_price = round($row['mrp'] / $gst_value);

                $gst_amount = round($row['mrp'] - $before_gst_price);

                MapColorSize::create([
                    'product_id' => $product->id,
                    'color_id' => $color->id,
                    'size_id' => $size->id,
                    'mrp' => $row['mrp'],
                    'stock' => $row['stock'],
                    'starting_price' => $row['starting_price'],
                    'sort_index' => $row['sort_index'],
                    'buy_it_now_price' => $before_gst_price,
                    'gst' => $gst_amount,
                    'status' => true,
                ]);

                MapProductMstSize::updateOrCreate([
                    'product_id' => $product->id,
                    'size_id' => $size->id,
                ], [
                    'product_id' => $product->id,
                    'size_id' => $size->id,
                    'title' => $size->title,
                ]);
            }
        }
        DB::commit();

        return;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}