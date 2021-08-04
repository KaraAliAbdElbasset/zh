<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SewingWorker extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'first_name', 'last_name', 'birth_date', 'birth_place',
        'father_name', 'mother_full_name', 'gender', 'address',
        'phone_number', 'qualification', 'work_start_date',
        'work_end_date', 'note','salary'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'birth_date' => 'date',
        'salary' => 'integer',
        'work_start_date' => 'date',
        'work_end_date' => 'date',
    ];


    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }
}
