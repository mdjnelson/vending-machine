<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsertedCoins extends Model
{
    public $timestamps = true;

    protected $table = 'inserted_coins';

    protected $fillable = ['coin_id'];
}
