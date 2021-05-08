<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'managing_office', 'establishing_date', 'year', 'address', 'goals', 'funding_sources',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'establishing_date' => 'date',
        'funding_sources' => 'array',
        'goals' => 'array',
    ];
}
