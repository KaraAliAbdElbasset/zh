<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralStatistic extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['first_name', 'last_name', 'birth_place', 'birth_date', 'father_name',
        'mother_full_name', 'gender',
        'address', 'phone_number', 'qualification',
        'job', 'job_address', 'social_status',
        'note','national_number','serial_number'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'birth_date' => 'date'
    ];


}
