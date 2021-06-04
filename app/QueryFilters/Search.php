<?php


namespace App\QueryFilters;


class Search extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (empty($q))
        {
            return $builder;
        }

        if (request()->is(['users*','clubs*','sewing-clients*','groups*']))
        {
            return $builder->where('name','like','%'.$q.'%');
        }

        if (request()->is(['teachers*','students*','sewing-workers*','general-statistics','funerals']))
        {
            return $builder->where('first_name','like','%'.$q.'%')->orWhere('last_name','like','%'.$q.'%');
        }

        if (request()->is('orders*'))
        {
             $builder->whereHas('client',function ($c) use ($q){
                 $c->where('name','like','%'.$q.'%');
             });
        }

        return $builder;

    }
}
