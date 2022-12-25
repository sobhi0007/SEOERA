<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::create([
            'name' => 'Layz',
            'price' => '30',
            'lang_id'=>1,
            'description'=>'Lay\'s is a brand of potato chips, as well as the name of the company that founded the chip brand in the United States.',
            'image'=>'uploads/product/layz.jfif'
        ]);
    }
}
