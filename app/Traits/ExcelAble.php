<?php


namespace App\Traits;


use App\Services\DataExport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

trait ExcelAble
{

    public function export(Model $model, array $columns = ['*'],$limit = -1)
    {
        $data = new DataExport($model,$columns,$limit);
        return Excel::download($data, $this->fileName($model));
    }

    protected function fileName($model): string
    {
        $name = Str::snake(class_basename(get_class($model)));
        return $name.'.xlsx';
    }

}
