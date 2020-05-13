<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendingMachineItems extends Model
{
    public $timestamps = true;

    protected $table = 'vending_machine_items';

    protected $fillable = ['item_id'];
}
