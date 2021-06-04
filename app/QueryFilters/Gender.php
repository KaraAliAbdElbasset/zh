<?php


namespace App\QueryFilters;


class Gender extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());

        if (!in_array($q,['male','female']))
        {
            return $builder;
        }

        return $builder->where('gender',$q);

    }
}
