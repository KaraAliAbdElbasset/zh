<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Student extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'first_name', 'last_name', 'birth_date', 'birth_place', 'gender', 'father_name', 'father_job',
        'mother_full_name', 'phone_number', 'address', 'enter_date', 'leave_date', 'education_level',
        'memorizing_level', 'behaviors', 'type',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'birth_date' => 'date',
        'enter_date' => 'date',
        'leave_date' => 'date',
        'type' => 'integer',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'name'
    ];

    public function getNameAttribute()
    {
        return $this->first_name. ' ' . $this->last_name;
    }

    /**
     * @return MorphMany
     */
    public function absences(): MorphMany
    {
        return $this->morphMany(Absence::class,'absenceable');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
