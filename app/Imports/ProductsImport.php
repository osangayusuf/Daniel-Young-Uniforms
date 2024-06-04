<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'sub_category' => $row['sub_category'],
            'name' => $row['name'],
            'description' => $row['description'],
            'category_id' => $row['category_id'],
            'image1' => $row['image1'],
            'image2' => $row['image2'],
            'image3' => $row['image3'],
            'image4' => $row['image4'],
            'colours' => $row['colours'],
            'availability' => 1,
            'price' => 4000
        ]);
    }
}
