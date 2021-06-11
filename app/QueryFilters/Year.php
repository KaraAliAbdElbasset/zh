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

        if (request()->is('clubs*'))
        {
            return $builder->where('year',$q);
        }

        return $builder->whereYear('created_at',$q);

    }
}
