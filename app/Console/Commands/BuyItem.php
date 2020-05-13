<?php

namespace App\Console\Commands;

use App\Helpers;
use App\Items;
use App\VendingMachineItems;
use Illuminate\Console\Command;

class BuyItem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'buyitem
        {itemid : The ID of the item}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buys an item from the vending machine';

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
        $itemID = $this->argument('itemid');

        if (!$item = Items::find($itemID)) {
            $this->error('Invalid item selected');
            return;
        }

        // Check that the item exists in the vending machine.
        if (!$vmItem = VendingMachineItems::where('item_id', $itemID)->first()) {
            $this->error('Item not avaliable');
            return;
        }

        // Check there is enough money in the machine.
        $insertedCoinsValue = Helpers::getValueOfInsertedCoins();
        if ($item->value > $insertedCoinsValue) {
            $this->error('Not enough money inserted');
            return;
        }

        // Ok, insert the coins into the vending machine.
        Helpers::addInsertedCoinsToVendingMachine();

        // Give the user a refund if necessary.
        if ($insertedCoinsValue > $item->value) {
            Helpers::refundUser($insertedCoinsValue, $item->value);
        }

        // Remove the item - it has been bought.
        $vmItem->delete();
    }
}
