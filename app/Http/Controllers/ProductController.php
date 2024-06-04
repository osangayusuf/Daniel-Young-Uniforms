<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{
    //Display shop view
    public function shop (Request $request)
    {
        return view('pages.shop', [
            'products' => Product::orderBy('id')
                ->filter($request->only('search', 'category', 'sub'))
                ->paginate(9)
                ->withPath('/shop/?search=' . $request->search . '&category=' . $request->category . '&sub=' . $request->sub),
            'sub_category' => Product::whereCategoryId($request->category)->distinct()->get('sub_category'),
            'current_category' => $request->category,
        ]);
    }

    // SHOW SINGLE PRODUCT PAGE
    public function productInfo(Product $product)
    {
        return view('pages.product-view', [
            'product' => $product,
            'similar' => Product::where('category_id', $product->category_id)->where('sub_category', $product->sub_category)->whereNot('id', $product->id)->paginate(10)
        ]);
    }

    public function importProducts()
    {
        Excel::import(new ProductsImport, 'products.xlsx');

        return redirect('/')->with('message', 'Products imported successfully');
    }
}
