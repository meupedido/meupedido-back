<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'doces',
            'salgados',
            'japonês',
            'congelados',
        ];

        foreach ($categories as $category){
            DB::table('categories_products')->insert([
                'description' => $category,
            ]);
        }
    }
}
