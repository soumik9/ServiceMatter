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
                'image' => '1521969345.png',
            ],
            [
                //2
                'name' => 'Beauty',
                'slug' => 'beauty',
                'image' => '1521969358.png',
            ],
            [
                //3
                'name' => 'Plumbing',
                'slug' => 'plumbing',
                'image' => '1521969409.png',
            ],
            [
                //4
                'name' => 'Electrical',
                'slug' => 'electrical',
                'image' => '1521969419.png',
            ],
            [
                //5
                'name' => 'Home Cleaning',
                'slug' => 'home-cleaning',
                'image' => '1521969446.png',
            ],
            [
                //6
                'name' => 'Shower Filter',
                'slug' => 'shower-filter',
                'image' => '1521969430.png',
            ],
            [
                //7
                'name' => 'Computer Repair',
                'slug' => 'computer-repair',
                'image' => '1521969512.png',
            ],
            [
                //8
                'name' => 'TV',
                'slug' => 'tv',
                'image' => '1521969522.png',
            ],
            [
                //9
                'name' => 'Car',
                'slug' => 'car',
                'image' => '1521969599.png',
            ],
            [
                //10
                'name' => 'Geyser',
                'slug' => 'geyser',
                'image' => '1521972593.png',
            ],
            [
                //11
                'name' => 'Chimney Hob',
                'slug' => 'chinmey-hob',
                'image' => '1521969490.png',
            ],
            [
                //12
                'name' => 'Refrigerator',
                'slug' => 'refrigerator',
                'image' => '1521969536.png',
            ],
            [
                //13
                'name' => 'Carpentry',
                'slug' => 'carpentry',
                'image' => '1521969454.png',
            ],
            [
                //14
                'name' => 'Painting',
                'slug' => 'painting',
                'image' => '1521972643.png',
            ],
            [
                //15
                'name' => 'Home Automation',
                'slug' => 'home-automation',
                'image' => '1521969622.png',
            ],
            [
                //16
                'name' => 'Laundry',
                'slug' => 'laundry',
                'image' => '1521972624.png',
            ],
            [
                //17
                'name' => 'Document',
                'slug' => 'document',
                'image' => '1521974355.png',
            ],
            [
                //18
                'name' => 'Movers & Packers',
                'slug' => 'movers-packers',
                'image' => '1521969599.png',
            ],
            [
                //19
                'name' => 'Pest Control ',
                'slug' => 'pest-control',
                'image' => '1521969464.png',
            ],
        ]);
    }
}
