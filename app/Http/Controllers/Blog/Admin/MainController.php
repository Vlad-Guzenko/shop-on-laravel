<?php

namespace App\Http\Controllers\Blog\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MetaTag;
use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\OrderRepository;

class   MainController extends AdminBaseController
{
    private $productRepository;
    private $orderRepository;

    public function  __construct(){
        parent::__construct();
        $this->productRepository =
            app(ProductRepository::class);
        $this->orderRepository =
            app(OrderRepository::class);
    }

    public function index(){
        $countOrders = MainRepository::getCountOrders();
        $countProducts = MainRepository::getCountProducts();
        $countUsers = MainRepository::getCountUsers();
        $countCategories = MainRepository::getCountCategories();

        $perpage = 4;
        $last_products = $this->productRepository->getLastProducts($perpage);
        $last_orders = $this->orderRepository->getLastOrders($perpage);
        MetaTag::setTags(['title' => 'Adminka']);
        return view('blog.admin.main.index',
        compact('countOrders',
                      'countProducts',
                         'countUsers',
                         'countCategories',
                         'last_products',
                         'last_orders')
        );
    }
}
