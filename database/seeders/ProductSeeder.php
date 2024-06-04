<?php

namespace Database\Seeders;

use App\Imports\ProductsImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Excel::import(new ProductsImport, 'products.xlsx');

    }
}
