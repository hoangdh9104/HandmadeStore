<?php

namespace Dell\Asmphp2\Controllers\Client;

use Dell\Asmphp2\Commons\Controller;
use Dell\Asmphp2\Commons\Helper;
use Dell\Asmphp2\Models\Category;
use Dell\Asmphp2\Models\Product;
use Dell\Asmphp2\Models\User;

class HomeController extends Controller
{
    private Product $product;
    private Category $category;
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }
    public function index()
    {
        $categories = $this->category->all();
        // $categories = $this->category->paginate(1,3);

        $page = $_GET['page'] ?? 1;
        [$products, $totalPage] = $this->product->paginate($page);

        $this->renderViewClient('home', [
            'products' => $products,
            'categories' => $categories,
            'totalPage' => $totalPage,
            'page' => $page
        ]);
    }
    
}
