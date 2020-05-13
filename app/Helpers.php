<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Helpers {

    /**
     * Gets the value of the inserted coins.
     *
     * @return float The value of inserted coins.
     */
    public static function getValueOfInsertedCoins(): float
    {
        $insertedCoins = DB::table('inserted_coins')
            ->join('coins', 'inserted_coins.coin_id', '=', 'coins.id')
            ->select('coins.value')
            ->get();

        $sum = 0;
        foreach ($insertedCoins as $coin) {
            $sum += $coin->value;
        }

        return $sum;
    }

    /**
     * Adds the inserted coins to the vending machine.
     */
    public static function addInsertedCoinsToVendingMachine(): void
    {
        if ($insertedCoins = InsertedCoins::all()) {
            foreach ($insertedCoins as $coin) {
                $vendingMachineCoins = new VendingMachineCoins();
                $vendingMachineCoins->coin_id = $coin->coin_id;
                $vendingMachineCoins->save();
            }
        }

        InsertedCoins::truncate();
    }

    /**
     * Refunds the user money.
     *
     * @param float $itemValue
     * @param float $moneyProvided
     */
    public static function refundUser(float $itemValue, float $moneyProvided)
    {
        if ($itemValue >= $moneyProvided) {
            return;
        }

        // @TODO.
    }
}
