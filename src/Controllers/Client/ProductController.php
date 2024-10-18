<?php

namespace Dell\Asmphp2\Controllers\Client;

use Dell\Asmphp2\Commons\Controller;
use Dell\Asmphp2\Commons\Helper;
use Dell\Asmphp2\Models\Category;
use Dell\Asmphp2\Models\Product;

class ProductController extends Controller
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
        // Lấy dữ liệu sản phẩm với phân trang
        [$products, $totalPage] = $this->product->paginate($_GET['page'] ?? 1, 4);

        // Lấy tất cả danh mục
        $categories = $this->category->all();

        // Truyền dữ liệu vào view
        $this->renderViewClient('product', [
            'products' => $products,
            // 'currentPage' => $page
            'categories' => $categories,
            'totalPage' => $totalPage
        ]);
    }
    public function detail($id)
    {
        $product = $this->product->findByID($id);

        $this->renderViewClient('productDetail', [
            'product' => $product
        ]);
    }
}
