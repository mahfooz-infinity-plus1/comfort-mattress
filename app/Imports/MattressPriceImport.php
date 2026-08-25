<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MattressPriceImport implements ToCollection
{
    public $rows = [];

    public function collection(Collection $collection)
    {
        $header = [];

        foreach ($collection as $index => $row) {

            $row = $row->toArray();

            /*
            |--------------------------------------------------------------------------
            | First Row = Header
            |--------------------------------------------------------------------------
            */

            if ($index === 0) {

                $header = $row;

                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Skip Empty Row
            |--------------------------------------------------------------------------
            */

            if (empty($row[0])) {
                continue;
            }

            $prices = [];

            foreach ($header as $key => $column) {

                if ($key === 0) {
                    continue;
                }

                if (!isset($row[$key])) {
                    continue;
                }

                $prices[$column] = $row[$key];
            }

            $this->rows[] = [
                'dimension' => $row[0],
                'prices'    => $prices,
            ];
        }
    }
}
