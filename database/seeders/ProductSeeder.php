<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

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
            'name' => 'Arabica',
            'price' => '125',
            'description' => ' Typically used for black coffee, Arabica beans have a sweeter, more complex flavor that you can drink straight. Funny thing is, even though it’s the most popular, it doesn’t have as much caffeine as Robusta.',
            'status' => 'Coffee',
            'limited' => '',
            'new' => '',
            'fast_selling' => '',
            'sold_out' => '1',
            'tag' => '',


        ]);

        Product::create([
            'name' => 'Black tea
            ',
            'price' => '64',
            'description' =>  'In general, Indian black teas tend to be stronger and more robust, and are often used in hearty breakfast blends that stand up well to the addition of milk and sweetener',
            'status' => 'Tea',
            'limited' => '',
            'new' => '1',
            'fast_selling' => '1',
            'sold_out' => '',
            'tag' => '',

        ]);

        Product::create([
            'name' => 'Robusta',
            'price' => '95',
            'description' => ' If your Monday morning is lagging, reach for a cup of coffee that uses Robusta beans. Their high caffeine content will wake you right up!',
            'status' => 'Coffee',
            'limited' => '1',
            'new' => '1',
            'fast_selling' => '1',
            'sold_out' => '',
            'tag' => '',

        ]);

        Product::create([
            'name' => 'Oolong tea
            ',
            'price' => '90',
            'description' => 'Oolong is a partially oxidized tea, placing it somewhere in between black and green teas in terms of oxidation. Oolong teas can range from around 10-80% oxidation, and can brew up anywhere from a pale yellow to a rich amber cup of tea. ',
            'status' => 'Tea',
            'limited' => '',
            'new' => '1',
            'fast_selling' => '1',
            'sold_out' => '',
            'tag' => '',

        ]);
    }
}
