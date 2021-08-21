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
        'first_name', 'last_name', 'first_name_fr', 'last_name_fr', 'birth_date', 'birth_place', 'gender', 'father_name', 'father_job',
        'mother_full_name', 'phone_number', 'address', 'enter_date', 'leave_date', 'education_level',
        'memorizing_level', 'behaviors', 'type','honor_rate',
        'memorization_level',
        'academic_average_1', 'academic_average_2', 'academic_average_3',
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


    public function getGroupNameAttribute()
    {
        return $this->groups()->first() ? $this->groups()->first()->name : '';
    }

    public function getGroupIdAttribute()
    {
        return $this->groups()->first() ? $this->groups()->first()->id : '';
    }

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

    public function getHonorRate()
    {
      if ($this->memorization_level)
      {
          if ($this->academic_average_3)
          {
              return ($this->academic_average_3 + ($this->memorization_level * 2))/3;
          }

          if ($this->academic_average_2)
          {
              return ($this->academic_average_2 + ($this->memorization_level * 2))/3;
          }

          if ($this->academic_average_1)
          {
              return ($this->academic_average_1 + ($this->memorization_level * 2))/3;
          }
      }
      return 0;
    }
}
