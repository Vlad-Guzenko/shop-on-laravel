<?php
namespace App\Repositories\Admin;

use App\Repositories\CoreRepository;
use App\Models\Admin\Order as Model;

class OrderRepository extends CoreRepository{

public function __construct(){
parent::__construct();
}

protected function getModelClass()
{
return Model::class;
}

public function getLastOrders($perpage){
$get = $this->startConditions()::withTrashed()
    ->join('users', 'orders.user_id', 'users.id')
    ->join('order_products','orders.id','order_products.order_id')
    ->select('orders.id','orders.user_id','orders.status',
        'orders.created_at','orders.updated_at','users.name',
        'orders.currency',
        \DB::raw('SUM(order_products.price)AS sum'))
    ->groupBy('orders.id')
    ->orderBy('orders.status')
    ->orderBy('orders.id','desc')
    ->toBase()
    ->paginate($perpage);

    return $get;
}
}
