<?php

namespace App\Console\Commands;

use App\Items;
use App\VendingMachineItems;
use Illuminate\Console\Command;

class AddItemsToMachine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service:additems
        {itemid : The ID of the item}
        {amount : The number of items}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds items to the vending machine';

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
        $amount = $this->argument('amount');

        if (!Items::find($itemID)) {
            $this->error('Invalid item provided');
            return;
        }

        for ($i = 1; $i <= $amount; $i++) {
            $item = new VendingMachineItems();
            $item->item_id = $itemID;
            $item->save();
        }

        $this->info('Items successfully added to vending machine');
    }
}
