<?php

namespace App\Console\Commands;

use App\InsertedCoins;
use App\Helpers;
use Illuminate\Console\Command;

class ReturnCoins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'returncoins';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns all the inserted coins in the vending machine';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $insertedCoins = Helpers::getInsertedCoins();

        if ($insertedCoins->isEmpty()) {
            $this->info('No coins to return');
            return;
        }

        foreach ($insertedCoins as $coin) {
            $this->info('Returning ' . ($coin->value * 100) . ' cents');
        }

        $this->info('Coins successfully returned');
        InsertedCoins::truncate();
    }
}
