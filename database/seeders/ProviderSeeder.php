<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provider = User::Where('email', 'provider@example.com')->first();

        if(is_null($provider))
        {
            $user = User::create([
                'name'      => 'MR Provider',
                'email'     => 'provider@example.com',
                'nid'       => '1212212000',
                'mobile'    => '01822115588',
                'utype'     => 'SVP',
                'password'  => bcrypt('abc123'),
                'status'    => 1
            ]);

            $user->assignRole('Provider');
        }
    }
}
