<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Purchase;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Faker\Factory as Faker;

class PurchasesSeeder extends Seeder
{
    public function run()
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            foreach ($order->orderItems as $item) {
                $purchase = new Purchase();
                $purchase->order_id = $order->id;
                $purchase->product_id = $item->product_id;
                $purchase->user_id = $order->user_id;
                $purchase->quantity = $item->quantity;
                $purchase->price = $item->price;
                $purchase->created_at = Carbon::parse('2024-05-05');
                $purchase->save();
            }
        }
    }
}
