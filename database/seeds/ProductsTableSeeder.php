<?php

use Illuminate\Database\Seeder;
use App\Product;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Product');
        for ($i=0; $i < 10 ; $i++) {

        DB::table('products')->insert([
            'name' => $faker->company,
            'description' => $faker->paragraph(5),
            'image' => $faker->imageUrl($width = 500, $height = 500),
            'price' => $faker->randomNumber(2),
                'discount' => rand(0, 30),
          ]);
        }
    }

}
