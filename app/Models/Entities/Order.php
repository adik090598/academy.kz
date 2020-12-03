<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const PROCESS = 0;
    public const ACCEPTED = 1;
    public const PASSED = 2;
    protected $fillable = ['status', 'quiz_id', 'user_id', 'transaction_id', 'price'];
}
