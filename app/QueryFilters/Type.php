<?php


namespace App\QueryFilters;


class Type extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (!in_array((int)$q, config('student.types'), true))
        {
            return $builder;
        }

        return $builder->where('type',$q);

    }
}
