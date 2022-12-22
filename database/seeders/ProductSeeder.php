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
            'description' => 'Arabica is the most popular type of coffee, hands down. Depending on who you ask, many coffee enthusiasts prefer using Arabica beans due to its taste. Typically used for black coffee, Arabica beans have a sweeter, more complex flavor that you can drink straight. Funny thing is, even though it’s the most popular, it doesn’t have as much caffeine as Robusta.',
            'status' => 'Coffee',
        ]);

        Product::create([
            'name' => 'Black tea
            ',
            'price' => '64',
            'description' => 'Black tea is primarily produced in China and India. Other up-and-coming tea-producing countries that export black tea include Sri Lanka, Nepal, Vietnam, and Kenya. In general, Indian black teas tend to be stronger and more robust, and are often used in hearty breakfast blends that stand up well to the addition of milk and sweetener. Many types of Indian black tea are categorized using a special system of tea grading in order to denote their quality.',
            'status' => 'Tea',
        ]);

        Product::create([
            'name' => 'Robusta',
            'price' => '95',
            'description' => 'While Arabica is the most popular, Robusta is cheaper and stronger. Because of its bitter flavor, you’ll typically see Robusta used for espresso drinks and in instant coffee mixes. If your Monday morning is lagging, reach for a cup of coffee that uses Robusta beans. Their high caffeine content will wake you right up!',
            'status' => 'Coffee',
        ]);

        Product::create([
            'name' => 'Black tea
            ',
            'price' => '90',
            'description' => 'Oolong is a partially oxidized tea, placing it somewhere in between black and green teas in terms of oxidation. Oolong teas can range from around 10-80% oxidation, and can brew up anywhere from a pale yellow to a rich amber cup of tea. Many oolongs can be re-infused many times, with subtle differences and nuances of flavor in each successive cup.',
            'status' => 'Tea',
        ]);
    }
}
