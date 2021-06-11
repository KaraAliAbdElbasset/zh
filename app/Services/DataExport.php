<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class DataExport implements FromCollection,  WithHeadings{
    private $model;
    private $columns;
    private $limit;
    public function __construct(Model $model, array $columns = ['*'],$limit = -1)
    {
        $this->model = $model;
        $this->columns = $columns;
        $this->limit = $limit;
    }

    public function collection()
    {
        $result =  app(Pipeline::class)
            ->send($this->model::select($this->columns)->newQuery())
            ->through([
                \App\QueryFilters\Sort::class,
                \App\QueryFilters\Year::class,
                \App\QueryFilters\Gender::class,
            ])->thenReturn();

        return $this->limit > 0
            ? $result->limit($this->limit)->get()
            : $result->get();
    }

    public function headings(): array
    {
        $attributes = $this->getModelColumnsLis();
        if ($this->columns[0] === '*')
        {
            return  $attributes;
        }

        $headings = [];

        foreach ($this->columns as $column)
        {
            if (in_array($column, $attributes, true))
            {
                $headings[] = $column;
            }
        }

        return $headings;
    }

    private function getModelColumnsLis(): array
    {
        return Schema::getColumnListing(($this->model)->getTable());
    }
}
