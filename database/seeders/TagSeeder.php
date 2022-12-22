<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'new']);
        Tag::create(['name' => 'fast selling']);
        Tag::create(['name' => 'limited stock']);
        Tag::create(['name' => 'sold out']);
    }
}
