<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Parfum A',
                'branch_id' => 2,
                'price' => 200000,
                'image' => '20220919152046.jpg'
            ],
            [
                'name' => 'Parfum B',
                'branch_id' => 3,
                'price' => 235000,
                'image' => '20220919153629.jpg'
            ],
            [
                'name' => 'Parfum C',
                'branch_id' => 4,
                'price' => 120000,
                'image' => '20220919153656.jpg'
            ],
            [
                'name' => 'Parfum D',
                'branch_id' => 5,
                'price' => 250000,
                'image' => '20220919153730.jpg'
            ],
        ];
        foreach ($products as $key => $name) {
            Product::create($name);
        }
    }
}
