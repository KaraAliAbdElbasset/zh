<?php


namespace App\QueryFilters;


class Year extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (empty($q))
        {
            return $builder;
        }

        return $builder->where('year',$q);

    }
}
