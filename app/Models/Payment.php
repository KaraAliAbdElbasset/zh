<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'month',
        'amount'
    ];

    public function paymentable()
    {
        return $this->morphTo();
    }
}
