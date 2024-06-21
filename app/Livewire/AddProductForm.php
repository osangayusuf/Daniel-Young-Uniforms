<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class AddProductForm extends Component
{
    public $sub_categories = [];

    public function render()
    {
        return view('livewire.add-product-form', [
            'sub_categories' => $this->sub_categories,
        ]);
    }

    public function getSubCategories(Category $category)
    {

        $this->sub_categories = Product::whereCategoryId($category->id)->distinct()->get('sub_category');
    }
}
