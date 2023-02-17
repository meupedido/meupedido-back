<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineOfBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $categories = [
            'Alimentos e Bebidas',
            'Bebês e Cia',
            'Brinquedos e Games',
            'Casa e Decoração',
            'Colecionáveis',
            'Construção e Ferramentas',
            'Cosméticos e Perfumaria',
            'Eletrônicos',
            'Esporte e Lazer',
            'Flores, Cestas e Presentes',
            'Informática',
            'Moda e Acessórios',
            'Papelaria e Escritório',
            'Pet Shop',
            'Serviços em Festas / Eventos',
            'Serviços Gráficos / Editoriais',
        ];

        foreach ($categories as $category){
            DB::table('line_of_business')->insert(
                [
                    'name' => $category,
                ]
            );
        }
    }
}
