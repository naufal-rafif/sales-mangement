<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'branch' => 'Indonesia',
            ],
            [
                'branch' => 'Surabaya',
            ],
            [
                'branch' => 'Bandung',
            ],
            [
                'branch' => 'Yogyakarta',
            ],
            [
                'branch' => 'Jakarta',
            ],

        ];

        foreach ($data as $key => $name) {
            Branch::create($name);
        }
    }
}
