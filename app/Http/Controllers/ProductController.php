<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{

    public function preShop()
    {
        return view('pages.pre-shop');
    }

    //Display shop view
    public function shop(Request $request)
    {
        $sub_categories = Product::whereCategoryId($request->category)->distinct()->get('sub_category');
        foreach ($sub_categories as $sub_category) {
            $classifications = Product::whereSubCategory($sub_category->sub_category)->distinct()->get('classification');
            $sub_category['classification'] = $classifications;

        }

        return view('pages.shop', [
            'products' => Product::orderBy('id')
                ->filter($request->only('search', 'category', 'sub', 'class'))
                ->paginate(9)
                ->withPath(route('shop') . '?search=' . $request->search . '&category=' . $request->category . '&sub=' . $request->sub . '&class=' . $request->class),
            'sub_categories' => $sub_categories,
            'current_category' => $request->category,
            'current_sub_category' => $request->sub,

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
        Excel::import(new ProductsImport, 'products-file.xlsx');

        return redirect('/')->with('message', 'Products imported successfully');
    }
}
