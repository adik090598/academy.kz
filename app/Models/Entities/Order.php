<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status', 'quiz_id', 'user_id', 'transaction_id'];
}
