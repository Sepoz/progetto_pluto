<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = 
        [
            ['categoryName' => 'Abbigliamento'],
            ['categoryName' => 'Giochi'],
            ['categoryName' => 'Auto e Moto'],
            ['categoryName' => 'Libri'],
            ['categoryName' => 'Casa e Cucina'],
            ['categoryName' => 'Elettronica'],
            ['categoryName' => 'Giardinaggio'],
            ['categoryName' => 'Gioielli'],
            ['categoryName' => 'Informatica'],
            ['categoryName' => 'Sport'],
            
        ];

        foreach ($categories as $category)
        {
            DB::table('categories')->insert([
                'categoryName'=>$category['categoryName'],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        };
    }
}
