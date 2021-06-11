<?php


namespace App\Contracts\ServiceContract;


use Illuminate\Database\Eloquent\Model;

interface ExportExcelContract
{
    /**
     * @param Model $model
     * @param array|string[] $columns
     * @param  $limit
     * @return mixed
     */
    public function export(Model $model, array $columns = ['*'],$limit = -1);
}
