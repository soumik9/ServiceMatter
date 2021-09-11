<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::Where('email', 'admin@example.com')->first();

        if(is_null($user))
        {
            $user = User::create([
                'name'      => 'Soumik Ahammed',
                'email'     => 'admin@example.com',
                'nid'       => '121220000',
                'mobile'    => '01689201370',
                'utype'     => 'ADM',
                'password'  => bcrypt('abc123'),
                'status'    => 1
            ]);

            $user->assignRole('Admin');
        }

    }
}
