<?php


namespace App\QueryFilters;


use App\Models\Student;

class Sort extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());

        if($builder->getModel() instanceof Student && $q === 'honor_rate')
        {
            return $builder->orderBy('honor_rate','desc');
        }

        if (in_array($q,['asc','desc']))
        {
            return $builder->orderBy('created_at',$q);
        }
        return $builder;
    }
}
