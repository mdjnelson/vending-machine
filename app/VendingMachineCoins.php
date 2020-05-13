<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendingMachineCoins extends Model
{
    public $timestamps = true;

    protected $table = 'vending_machine_coins';

    protected $fillable = ['coin_id'];
}
