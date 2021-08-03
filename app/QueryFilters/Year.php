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
            return $builder->where('year',$q);
        }

        if (request()->is('funerals*'))
        {
            $date = Carbon::createFromDate($q, 1, 1);
            return $builder->where('death_date','>=',$date->format('Y'))->where('death_date', '<', $date->addYear()->format('Y'));
        }

        return $builder->whereYear('created_at',$q);

    }
}
