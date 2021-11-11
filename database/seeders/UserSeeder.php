<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = User::Where('email', 'customer@example.com')->first();

        if(is_null($customer))
        {
            $user = User::create([
                'name'      => 'MR Customer',
                'email'     => 'customer@example.com',
                'nid'       => '12122125800',
                'mobile'    => '01822122556',
                'utype'     => 'CST',
                'password'  => bcrypt('abc123'),
                'status'    => 1
            ]);

            $user->assignRole('Customer');
        }
    }
}
