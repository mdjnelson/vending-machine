<?php

namespace App\Console\Commands;

use App\Coins;
use App\VendingMachineCoins;
use Illuminate\Console\Command;

class AddCoinsToMachine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service:addcoins
        {coinid : The ID of the coin}
        {amount : The number of coins}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds coins to the vending machine';

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
        $coinID = $this->argument('coinid');
        $amount = $this->argument('amount');

        if (!Coins::find($coinID)) {
            $this->error('Invalid coin');
            return;
        }

        for ($i = 1; $i <= $amount; $i++) {
            $item = new VendingMachineCoins();
            $item->coin_id = $coinID;
            $item->save();
        }

        $this->info('Coins successfully added to vending machine');
    }
}
