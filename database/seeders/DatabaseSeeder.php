<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        DB::table('clients')->insert([
            'full_name' => 'Надежда Трофимова Д',
            'is_female' => 1,
            'tel' => 222222,
            'address' => 'Волгоград',
        ]);
        DB::table('clients')->insert([
            'full_name' => 'Иван Иванов И',
            'is_female' => 0,
            'tel' => 2222223,
            'address' => 'Волгоград',
        ]);
        DB::table('clients')->insert([
            'full_name' => 'Павел Иванов Л',
            'is_female' => 0,
            'tel' => 79001234567,
            'address' => 'Саратов',
        ]);
        DB::table('clients')->insert([
            'full_name' => 'Екатерина Петрова К',
            'is_female' => 1,
            'tel' => 79001234512,
            'address' => 'Волгоград',
        ]);
        DB::table('clients')->insert([
            'full_name' => 'Анастасия Павлова Н',
            'is_female' => 1,
            'tel' => 79001234589,
            'address' => 'Волгоград',
        ]);
        DB::table('clients')->insert([
            'full_name' => 'Наталья Светлая О',
            'is_female' => 1,
            'tel' => 79001234590,
            'address' => 'Волгоград',
        ]);
    }
}
