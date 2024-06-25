<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            $orderCount = rand(1, 5); // случайное количество заказов для каждого пользователя

            for ($i = 0; $i < $orderCount; $i++) {
                Order::create([
                    'user_id' => $user->id,
                    'order_date' => Carbon::now()->subDays(rand(1, 30)), // случайная дата в последний месяц
                ]);
            }
        }
    }
}
