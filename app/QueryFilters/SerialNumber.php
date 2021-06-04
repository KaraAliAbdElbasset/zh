<?php


namespace App\QueryFilters;


class SerialNumber extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());

        if (!in_array($q,['yes','no']))
        {
            return $builder;
        }

        return $q === 'yes'
            ? $builder->whereNotNull('serial_number')
            : $builder->whereNull('serial_number');

    }
}
