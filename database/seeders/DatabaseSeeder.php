<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Image;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $users = User::factory(20)
            ->create()
            ->each(function($user){
                // crear una imagen de tipo usuario para cada usuario generado
                $image = Image::factory()
                    ->user()
                    ->make();

                $user->image()->save($image);
            });

        $orders = Order::factory(10)
            ->make() // no crear inmediatamente en la BD
            ->each(function($order) use ($users){
                $order->customer_id = $users->random()->id;
                // una vez que se tienen todos los datos, guardar en BD
                $order->save();

                $payment = Payment::factory()->make();

                //$payment->order_id = $order->id;
                //$payment->save();

                // guardar usando las relaciones
                $order->payment()->save($payment);

            });

            $carts = Cart::factory(20)->create();

            $products = Product::factory(50)
                ->create()
                ->each(function($product) use($orders, $carts){
                    // obtener una orden de forma aleatoria de la lista anterior
                    $order = $orders->random();
                    $order->products()->attach([
                        $product->id => ['quantity' => mt_rand(1,3)]
                    ]);

                    $cart = $carts->random();
                    $cart->products()->attach([
                        $product->id => ['quantity' => mt_rand(1,3)]
                    ]);

                    $images = Image::factory(mt_rand(2,4))->make();
                    $product->images()->saveMany($images);

                });
    }
}
