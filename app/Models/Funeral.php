<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funeral extends Model
{
    use HasFactory;

    /**
     * @var string[] 
     */
    protected $fillable = [
        'first_name', 'last_name', 'birth_place', 'birth_date', 'death_place',
        'death_date', 'father_name', 'mother_full_name', 'gender', 'expenses',
        'meals_number', 'contributors', 'moderators', 'note',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'birth_date' => 'date',
        'death_date' => 'date',
    ];
}
