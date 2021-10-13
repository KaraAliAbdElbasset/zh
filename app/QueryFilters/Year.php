<?php


namespace App\QueryFilters;


use Carbon\Carbon;

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
            return $builder->whereYear('establishing_date',$q);
        }

        if (request()->is('funerals*'))
        {
            $date = Carbon::createFromDate($q, 1, 1);
            return $builder->whereYear('death_date',$q);
        }

        return $builder->whereYear('created_at',$q);

    }
}
