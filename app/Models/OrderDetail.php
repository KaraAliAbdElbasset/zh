<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['order_id', 'product', 'price', 'qty', 'total'];

    /**
     * @var string[]
     */
    protected $casts = [
        'price' => 'integer',
        'qty'   => 'integer',
        'total' => 'integer'
    ];

    /**
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
