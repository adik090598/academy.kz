<?php

namespace App\Models\Entities;

use App\Models\Entities\Core\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const PROCESS = 0;
    public const ACCEPTED = 1;
    public const PASSED = 2;
    protected $fillable = ['status', 'quiz_id', 'user_id', 'transaction_id', 'price'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
