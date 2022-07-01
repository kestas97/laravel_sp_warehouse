<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

class ProductImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.title' => 'required|max:100',
            '*.manufacturer_id' => 'required|numeric',
            '*.category_id' => 'required|numeric',
            '*.flavor_id' => 'required|numeric',
            '*.quantity' => 'required|numeric',
            '*.location_id' => 'required|numeric',
            '*.image' => 'required|max:50',

        ])->validate();

        foreach ($rows as $row) {
            Product::updateOrCreate([
                'title' => $row['title'],
                'manufacturer_id' => $row['manufacturer_id'],
                'category_id' => $row['category_id'],
                'flavor_id' => $row['flavor_id'],
                'quantity' => $row['quantity'],
                'location_id' => $row['location_id'],
                'image' => $row['image']
            ]);
        }
    }
}
