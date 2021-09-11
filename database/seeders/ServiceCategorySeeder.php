<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_categories')->insert([
            [
                //1
                'name' => 'AC',
                'slug' => 'ac',
                'status' => 1,
            ],
            [
                //2
                'name' => 'Beauty',
                'slug' => 'beauty',
                'status' => 1,
            ],
            [
                //3
                'name' => 'Plumbing',
                'slug' => 'plumbing',
                'status' => 1,
            ],
            [
                //4
                'name' => 'Electrical',
                'slug' => 'electrical',
                'status' => 1,
            ],
            [
                //5
                'name' => 'Home Cleaning',
                'slug' => 'home-cleaning',
                'status' => 1,
            ],
            [
                //6
                'name' => 'Shower Filter',
                'slug' => 'shower-filter',
                'status' => 1,
            ],
            [
                //7
                'name' => 'Computer Repair',
                'slug' => 'computer-repair',
                'status' => 1,
            ],
            [
                //8
                'name' => 'TV',
                'slug' => 'tv',
                'status' => 1,
            ],
            [
                //9
                'name' => 'Car',
                'slug' => 'car',
                'status' => 1,
            ],
            [
                //10
                'name' => 'Geyser',
                'slug' => 'geyser',
                'status' => 1,
            ],
            [
                //11
                'name' => 'Chimney Hob',
                'slug' => 'chinmey-hob',
                'status' => 1,
            ],
            [
                //12
                'name' => 'Refrigerator',
                'slug' => 'refrigerator',
                'status' => 1,
            ],
            [
                //13
                'name' => 'Carpentry',
                'slug' => 'carpentry',
                'status' => 1,
            ],
            [
                //14
                'name' => 'Painting',
                'slug' => 'painting',
                'status' => 1,
            ],
            [
                //15
                'name' => 'Home Automation',
                'slug' => 'home-automation',
                'status' => 1,
            ],
            [
                //16
                'name' => 'Laundry',
                'slug' => 'laundry',
                'status' => 1,
            ],
            [
                //17
                'name' => 'Document',
                'slug' => 'document',
                'status' => 1,
            ],
            [
                //18
                'name' => 'Movers & Packers',
                'slug' => 'movers-packers',
                'status' => 1,
            ],
            [
                //19
                'name' => 'Pest Control ',
                'slug' => 'pest-control',
                'status' => 1,
            ],
        ]);
    }
}
