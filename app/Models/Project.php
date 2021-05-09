<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $data)
 */
class Project extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'club_id', 'name', 'start_date', 'end_date', 'amount', 'note',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'amount' => 'integer',
    ];

    /**
     * @return BelongsTo
     */
    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }
}
