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

        DB::table('cars')->insert([
            'brand' => 'kia',
            'model' => 'rio',
            'body_color' => 'red',
            'plate_number' => 'A100AA34',
            'is_parked' => 0,
            'owner_id' => 1
        ]);
        DB::table('cars')->insert([
            'brand' => 'kia',
            'model' => 'rio',
            'body_color' => 'black',
            'plate_number' => 'A101AA34',
            'is_parked' => 1,
            'owner_id' => 2
        ]);
        DB::table('cars')->insert([
            'brand' => 'lada',
            'model' => 'kalina',
            'body_color' => 'red',
            'plate_number' => 'A102AA134',
            'is_parked' => 0,
            'owner_id' => 2
        ]);
        DB::table('cars')->insert([
            'brand' => 'kia',
            'model' => 'rio',
            'body_color' => 'yellow',
            'plate_number' => 'A103AA34',
            'is_parked' => 1,
            'owner_id' => 3
        ]);
        DB::table('cars')->insert([
            'brand' => 'lada',
            'model' => 'kalina',
            'body_color' => 'red',
            'plate_number' => 'A112AA134',
            'is_parked' => 0,
            'owner_id' => 4
        ]);
        DB::table('cars')->insert([
            'brand' => 'kia',
            'model' => 'rio',
            'body_color' => 'yellow',
            'plate_number' => 'A133AA34',
            'is_parked' => 0,
            'owner_id' => 5
        ]);
        DB::table('cars')->insert([
            'brand' => 'kia',
            'model' => 'rio',
            'body_color' => 'yellow',
            'plate_number' => 'A135AA34',
            'is_parked' => 1,
            'owner_id' => 6
        ]);
        DB::table('cars')->insert([
            'brand' => 'lada',
            'model' => 'kalina',
            'body_color' => 'red',
            'plate_number' => 'И222AA134',
            'is_parked' => 1,
            'owner_id' => 6
        ]);
        DB::table('cars')->insert([
            'brand' => 'kia',
            'model' => 'rio',
            'body_color' => 'yellow',
            'plate_number' => 'A234AA34',
            'is_parked' => 0,
            'owner_id' => 6
        ]);
    }
}
