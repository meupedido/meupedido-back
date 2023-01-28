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
        Company::factory()->count(2)->create([
            'opening_hours' => Carbon::createFromTimeString('18:00:00'),
            'closing_hours' => Carbon::createFromTimeString('23:00:00'),
            'password' => '1234',
        ])->each( function ($company) {
            CompanyAddress::factory()->create([
                'company_id' => $company->id,
            ]);
            Product::factory()->count(20)->create([
                'company_id' => $company->id,
                'category_id' => $company->id,
            ]);
        });

        Company::factory()->create([
            'email' => "gil@gmail.com",
            'opening_hours' => Carbon::createFromTimeString('18:00:00'),
            'closing_hours' => Carbon::createFromTimeString('23:00:00'),
            'password' => '1234',
        ])->each( function ($company) {
            CompanyAddress::factory()->create([
                'company_id' => $company->id,
            ]);
        });

        Company::factory()->create([
            'email' => "teste@teste.com",
            'opening_hours' => Carbon::createFromTimeString('18:00:00'),
            'closing_hours' => Carbon::createFromTimeString('23:00:00'),
            'password' => 'kmzwa8awaa',
        ])->each( function ($company) {
            CompanyAddress::factory()->create([
                'company_id' => $company->id,
            ]);
        });
    }
}
