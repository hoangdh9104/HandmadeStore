<?php

namespace Dell\Asmphp2\Controllers\Client;

use Dell\Asmphp2\Commons\Controller;
use Dell\Asmphp2\Models\Category;
use Dell\Asmphp2\Models\Product;

class CategoryController extends Controller
{
    private Product $product;
    private Category $category;
    public function index()
    {
        
    }

    public function detail($id)
    {
        
    }
    public function show($id)
    {
        $product = $this->product->findByID($id);

        $this->renderViewAdmin('products.show', [
            'product' => $product
        ]);
    }
}