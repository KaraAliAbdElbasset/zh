<?php


namespace App\Repositories;


use Illuminate\Routing\Pipeline;

abstract class BaseRepository
{

    protected $baseFilters = [];

    public function applyFilter($query,int $per_page = 10, $filters = [])
    {
        $filters = count($filters) > 0 ? array_merge($this->baseFilters,$filters) : $this->baseFilters;

        $result = app(Pipeline::class)
            ->send($query)
            ->throught($filters)
            ->theReturn();

        if ($per_page > 0 )
        {
            return $result->paginate($per_page)->withQueryString();
        }

        return $result->get();
    }
}
