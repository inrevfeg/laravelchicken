<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductUnit;

class ProductUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['product_unit' => 'Kg'],       
            ['product_unit' => 'Count'],
        ];

        $data = ProductUnit::insert($data);
    }
}
