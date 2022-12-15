<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        return Command::SUCCESS;
    }
}
