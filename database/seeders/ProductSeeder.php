<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'detail' => json_encode([
                    'color' => 'red',
                    'size' => ['S', 'M', 'L'],
                    'material' => ['metal', 'wood']
                ]),
            ],
            [
                'name' => 'Product 2',
                'detail' => json_encode([
                    'color' => ['green', 'yellow'],
                    'size' => ['S', 'M'],
                    'material' => ['cotton', 'wood']
                ]),
            ],
            [
                'name' => 'Product 3',
                'detail' => json_encode([
                    'color' => ['green', 'yellow'],
                    'size' => ['S', 'M'],
                    'brand' => 'ASUS',
                    'ram' => '18GB'
                ]),
            ],
            [
                'name' => 'Product 4',
                'detail' => json_encode([
                    'color' => 'black',
                    'brand' => 'HP'
                ]),
            ],
        ]);
    }
}
