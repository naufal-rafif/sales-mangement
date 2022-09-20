<?php

namespace Database\Seeders;

use App\Models\Sales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sales = [
            [
                'description' => 'Parfum A',
                'status' => 'ditinjau',
                'branch_id' => 2,
                'product_id' => 1,
                'user_id' => 4,
                'qty' => 12,
                'image' => '20220919233129.jpg'
            ],
            [
                'description' => 'Parfum B',
                'status' => 'ditinjau',
                'branch_id' => 2,
                'product_id' => 1,
                'user_id' => 4,
                'qty' => 20,
                'image' => '20220919234723.jpg'
            ],
        ];
        foreach ($sales as $key => $name) {
            Sales::create($name);
        }
    }
}
