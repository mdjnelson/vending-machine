<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Add the items that are possible to purchase.
        $items = [];
        $items[] = DB::table('items')->insertGetId([
            'name' => 'Water',
            'value' => 0.65,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $items[] = DB::table('items')->insertGetId([
            'name' => 'Juice',
            'value' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $items[] = DB::table('items')->insertGetId([
            'name' => 'Soda',
            'value' => 1.50,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Add the type of coins that can be inserted.
        $coins = [];
        $coins[] = DB::table('coins')->insertGetId([
            'name' => '5 cents',
            'value' => 0.05,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $coins[] = DB::table('coins')->insertGetId([
            'name' => '10 cents',
            'value' => 0.10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $coins[] = DB::table('coins')->insertGetId([
            'name' => '25 cents',
            'value' => 0.25,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $coins[] = DB::table('coins')->insertGetId([
            'name' => '1 dollar',
            'value' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Add a bunch of coins to the vending machine to use as refunds.
        $numberOfItems = rand(10, 100);
        for ($i = 0; $i < $numberOfItems; $i++) {
            $riid = array_rand($items);
            // Insert a new record in the database
            DB::table('vending_machine_items')->insert([
                'item_id' => $items[$riid],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // Add a bunch of items to the vending machine that users can buy.
        $numberOfCoins = rand(50, 100);
        for ($i = 0; $i < $numberOfCoins; $i++) {
            $rcid = array_rand($coins);
            // Insert a new record in the database
            DB::table('vending_machine_coins')->insert([
                'coin_id' => $coins[$rcid],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
