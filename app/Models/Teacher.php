<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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
        'first_name', 'last_name', 'first_name_fr', 'last_name_fr', 'phone_number', 'address', 'birth_date', 'birth_place', 'father_name',
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

    protected $appends = [
        'name'
    ];

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * @return HasMany
     */
    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    /**
     * @return MorphMany
     */
    public function absences(): MorphMany
    {
        return $this->morphMany(Absence::class,'absenceable');
    }
}
