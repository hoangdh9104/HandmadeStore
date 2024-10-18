<?php

namespace Dell\Asmphp2\Controllers\Admin;

use Dell\Asmphp2\Commons\Controller;
use Dell\Asmphp2\Commons\Helper;
use Dell\Asmphp2\Models\Category;
use Dell\Asmphp2\Models\Contact;
use Dell\Asmphp2\Models\Order;
use Dell\Asmphp2\Models\Product;
use Dell\Asmphp2\Models\User;

class DashboardController extends Controller
{
    private Product $product;
    private User $user;
    private Category $category;
    private Order $order;
    private Contact $contact;

    public function __construct()
    {
        $this->product = new Product();
        $this->user = new User();
        $this->category = new Category();
        $this->order = new Order();
        $this->contact = new Contact();
    }

    public function dashboard() {
        // Tổng số sản phẩm
        $totalProducts = $this->product->count();

        // Tổng số đơn hàng
        $totalOrders = $this->order->count();

        // Tổng số liên hệ
        $totalContacts = $this->contact->count();

        // Tổng số người dùng
        $totalUsers = $this->user->count();

        $this->renderViewAdmin('dashboard', [
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'totalContacts' => $totalContacts,
            'totalUsers' => $totalUsers
        ]);
    }

    

}