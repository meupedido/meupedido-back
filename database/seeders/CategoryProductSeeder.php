<?php

namespace Database\Seeders;

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
            [
                'name' => 'doces',
                'branch_id' => 1,
            ],
            [
                'name' => 'salgados',
                'branch_id' => 1,
            ],
            [

                'name' => 'japonês',
                'branch_id' => 1,
            ],
            [
                'name' => 'congelados',
                'branch_id' => 1,
            ],
        ];

        foreach ($categories as $category){
            DB::table('categories_products')->insert([
                'description' => $category['name'],
                'branch_id' => $category['branch_id'],
            ]);
        }
    }
}
