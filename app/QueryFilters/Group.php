<?php


namespace App\QueryFilters;


class Group extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());

        if ($q === "all")
        {
            return  $builder;
        }

        return $builder->whereHas('groups',function ($query) use ($q){
            $query->where('groups.id',$q);
        });

    }
}
