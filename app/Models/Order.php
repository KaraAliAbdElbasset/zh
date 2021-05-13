<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $data)
 */
class Order extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'sewing_client_id',
        'due_date',
        'amount',
        'paid',
        'note',
        'products'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'due_date' => 'date',
        'amount' => 'integer',
        'paid' => 'paid',
        'products' => 'array',
    ];

    /**
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(SewingClient::class);
    }

}
