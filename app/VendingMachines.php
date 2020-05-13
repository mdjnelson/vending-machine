<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendingMachines extends Model
{
    public $timestamps = true;

    protected $table = 'vending_machines';

    protected $fillable = ['name'];
}
