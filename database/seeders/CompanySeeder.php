<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyAddress;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Company::factory()->create([
            'email' => "gil@gmail.com",
            'opening_hours' => Carbon::createFromTimeString('18:00:00'),
            'closing_hours' => Carbon::createFromTimeString('23:00:00'),
            'password' => '1234',
        ])->each( function ($company) {
            CompanyAddress::factory()->create([
                'company_id' => $company->id,
            ]);
            Product::factory()->create([
                'company_id' => $company->id,
            ]);
        });

        Company::factory()->create([
            'name' => 'Test Company',
            'email' => "teste@teste.com",
            'cnpj' => '00000000000',
            'opening_hours' => Carbon::createFromTimeString('18:00:00'),
            'closing_hours' => Carbon::createFromTimeString('23:00:00'),
            'password' => '1234',
            'branch_id' => 1, //doce, salgados, etc
        ])->each( function ($company) {
            CompanyAddress::factory()->create([
                'company_id' => $company->id,
            ]);
            Product::factory(5)->create([
                'company_id' => $company->id,
            ]);
        });
    }
}
