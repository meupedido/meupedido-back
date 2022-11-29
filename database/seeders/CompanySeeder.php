<?php

namespace Database\Seeders;

use App\Models\Company;
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
        ]);
    }
}
