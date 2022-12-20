<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer_support =  User::create([
            'name' => 'customer_support',
            'email' => 'customer_support@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
        ]);

        $customer_support->assignRole('customer_support');
    }
}
