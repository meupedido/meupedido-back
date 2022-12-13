<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyAddress;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'payment_methods' => 'dinheiro, pix, cartao',
            'opening_hours' => Carbon::createFromTimeString('18:00:00'),
            'closing_hours' => Carbon::createFromTimeString('23:00:00'),
        ])->each( function ($company) {
            CompanyAddress::factory()->create([
                'company_id' => $company->id,
            ]);
            Product::factory()->count(2)->create([
                'company_id' => $company->id,
                'category_id' => $company->id,
            ]);
        });
    }
}
