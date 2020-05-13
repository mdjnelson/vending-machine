<?php

namespace App\Console\Commands;

use App\Coins;
use App\InsertedCoins;
use Illuminate\Console\Command;

class InsertCoin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insertcoin
                        {coinid : The ID of the coin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserts a coin into the vending machine';

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

        if (!Coins::find($coinID)) {
            $this->error('Invalid coin inserted');
            return;
        }

        InsertedCoins::create([
            'coin_id' => $coinID,
        ]);

        $this->info('Coin inserted successfully');
    }
}
