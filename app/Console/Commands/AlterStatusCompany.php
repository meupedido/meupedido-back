<?php

namespace App\Console\Commands;

use App\Models\Company;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;

class AlterStatusCompany extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alter:AlterStatusCompany';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando muda o estado da empresa';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->checkStatusCompany();

        return Command::SUCCESS;
    }

    public function checkStatusCompany()
    {
        $companies = Company::all();

        foreach ($companies as $company)
        {
            $date_opening = Carbon::createFromTime(
                substr($company->opening_hours, 0, 2),
                substr($company->opening_hours, 3, 2),
                substr($company->opening_hours, 6, 3),
            );

            $date_closed = Carbon::createFromTime(
                substr($company->closing_hours, 0, 2),
                substr($company->closing_hours, 3, 2),
                substr($company->closing_hours, 6, 3),
            );

            $date_actual = Carbon::now(new DateTimeZone('America/Sao_Paulo'));

            if ($date_actual >= $date_opening && $date_actual <= $date_closed){
                $company->status = 'open';
                $company->save();
            } else {
                $company->status = 'closed';
                $company->save();
            };
        }
    }
}
