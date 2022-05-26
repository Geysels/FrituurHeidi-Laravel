<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/seeders/seeds/products.json');
        $products = json_decode($json, true);

        foreach ($products as $product) {
            $products = Product::create([
                'name' => $product['name'],
                'visible' => $product['visible'],
                'price' => $product['price'],
                'category_id' => $product['category_id'],
                'remark' => $product['remark'],
            ]);
        }
    }
}
