<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([  
            RolePermissionSeeder::class,
            AdminSeeder::class,
            ProviderSeeder::class,
            UserSeeder::class,
            CurrencySeeder::class,
            ServiceCategorySeeder::class,
            SettingSeeder::class,
        ]);

         //factory
         \App\Models\Service::factory(20)->create();
    }
}
