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
            'Arte e Antiguidades',
            'Assinaturas e Revistas',
            'Automóveis e Veículos',
            'Bebês e Cia',
            'Brindes / Materiais Promocionais',
            'Brinquedos e Games',
            'Casa e Decoração',
            'Colecionáveis',
            'Compras Coletivas',
            'Construção e Ferramentas',
            'Cosméticos e Perfumaria',
            'Cursos e Educação',
            'Eletrodomésticos',
            'Eletrônicos',
            'Esporte e Lazer',
            'Flores, Cestas e Presentes',
            'Fotografia',
            'Indústria, Comércio e Negócios',
            'Informática',
            'Instrumentos Musicais',
            'Joalheria',
            'Lazer',
            'Livros',
            'Moda e Acessórios',
            'Negócios e Oportunidades',
            'Papelaria e Escritório',
            'Pet Shop',
            'Saúde',
            'Serviço Advocaticios',
            'Serviços Administrativos',
            'Serviços Artísticos',
            'Serviços de Agências',
            'Serviços de Aluguel / Locação',
            'Serviços de Assistência Técnica / Instalações',
            'Serviços de Associações',
            'Serviços de Bancos de Sangue',
            'Serviços de Bibliotecas',
            'Serviços de Cartórios',
            'Serviços de Casas Lotéricas',
            'Serviços de Confecções',
            'Serviços de Consórcios',
            'Serviços de Consultorias',
            'Serviços de Engenharia',
            'Serviços de limpeza',
            'Serviços de Loja de Conveniência',
            'Serviços de Mão de Obra',
            'Serviços de Saúde / Bem Estar',
            'Serviços de Seguradoras',
            'Serviços de Segurança',
            'Serviços de Utilidade Pública',
            'Serviços em Agricultura / Pecuária / Piscicultura',
            'Serviços em Alimentação',
            'Serviços em Arte',
            'Serviços em Cine / Foto / Som',
            'Serviços em Comunicação',
            'Serviços em Construção',
            'Serviços em Ecologia / Meio Ambiente',
            'Serviços em Eletroeletrônica / Metal Mecânica',
            'Serviços em Festas / Eventos',
            'Serviços em Informática',
            'Serviços em Internet',
            'Serviços em Jóias / Relógios / Óticas',
            'Serviços em Telefonia',
            'Serviços em Veículos',
            'Serviços Financeiros',
            'Serviços Gerais',
            'Serviços Gráficos / Editoriais',
            'Serviços para Animais',
            'Serviços para Escritórios',
            'Serviços para Roupas',
            'Serviços Socias / Assistenciais',
            'Sex Shop',
            'Shopping Centers',
            'Telefonia',
            'Turismo',
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
