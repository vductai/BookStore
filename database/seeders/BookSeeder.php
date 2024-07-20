<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = faker::create();
        for ($i = 1; $i <= 8; $i++){
            DB::table('books')->insert([
               'book_name'=> $fake->text(5),
                'price'=> $fake->randomFloat(1,6,10),
                'image'=>$fake->text(7),
                'desc'=> $fake->text(9),
                'category_id'=>rand(1,2)
            ]);
        }
    }
}
