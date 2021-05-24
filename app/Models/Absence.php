<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Absence extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'reason', 'group_id'
    ];

    /**
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Get the parent commentable model (post or video).
     */
    public function absenceable(): MorphTo
    {
        return $this->morphTo();
    }
}
