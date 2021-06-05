<?php


namespace App\QueryFilters;


class MemorizingLevel extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());

        if (request()->get('type') !== '1')
        {
            return  $builder;
        }

        if ($q >= 0 && $q <= 60)
        {
            return $builder->where('memorizing_level',$q);

        }
        return $builder;
    }
}
