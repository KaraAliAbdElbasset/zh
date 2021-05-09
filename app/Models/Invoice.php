<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $data)
 */
class Invoice extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'club_id', 'client_name', 'amount', 'note','date'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'amount' => 'integer',
        'date' => 'date',
    ];

    /**
     * @return BelongsTo
     */
    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }
}
