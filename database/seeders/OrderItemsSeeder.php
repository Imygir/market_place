<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Faker\Factory as Faker;

class OrderItemsSeeder extends Seeder
{
    public function run()
    {
        $orders = Order::all();
        $products = Product::all();
        $faker = Faker::create();

        foreach ($orders as $order) {
            $productCount = rand(1, 5); // случайное количество товаров в заказе

            for ($i = 0; $i < $productCount; $i++) {
                $product = $products->random();
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => rand(1, 10),
                    'price' => $faker->randomFloat(2, 10, 100),
                ]);
            }
        }
    }
}
