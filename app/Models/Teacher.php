<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 */
class Teacher extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone_number', 'address', 'birth_date', 'birth_place', 'father_name',
        'mother_full_name', 'work_start_date', 'work_end_date', 'salary', 'gender', 'qualification',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'birth_date' => 'date',
        'work_start_date' => 'date',
        'work_end_date' => 'date',
        'salary' => 'integer',
    ];
}
