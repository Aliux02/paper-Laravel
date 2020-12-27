<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function machine()
    {
        return $this->belongsTo('App\Models\Machine','machine_id', 'id');
    }
}