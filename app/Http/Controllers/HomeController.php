<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {

        return view('welcome',$this->getCounts());
    }

    /**
     * @return array
     */
    private function getCounts(): array
    {
        return [
            'sc_count'        => DB::table('sewing_clients')->count(),
            'sw_count'        => DB::table('sewing_workers')->count(),
            'teachers_count'  => DB::table('teachers')->count(),
            'students_count'  => DB::table('students')->count(),
            'clubs_count'     => DB::table('clubs')->count(),
            'gs_count'        => DB::table('general_statistics')->count(),
            'f_count'         => DB::table('funerals')->count(),
            'chart_data'      => $this->getChartdata()
        ];
    }

    private function getChartdata()
    {
        $sewing_clients = DB::table('sewing_clients')
            ->select(DB::raw("MONTH(created_at) as month"), DB::raw('count(*) as total'))
            ->groupBy('month')
            ->get();

        $teachers = DB::table('teachers')
            ->select(DB::raw("MONTH(created_at) as month"), DB::raw('count(*) as total'))
            ->groupBy('month')
            ->get();

        $students = DB::table('students')
            ->select(DB::raw("MONTH(created_at) as month"), DB::raw('count(*) as total'))
            ->groupBy('month')
            ->get();

        $sewing_workers = DB::table('sewing_workers')
            ->select(DB::raw("MONTH(created_at) as month"), DB::raw('count(*) as total'))
            ->groupBy('month')
            ->get();

        $clubs = DB::table('clubs')
            ->select(DB::raw("MONTH(created_at) as month"), DB::raw('count(*) as total'))
            ->groupBy('month')
            ->get();

        $funerals = DB::table('funerals')
            ->select(DB::raw("MONTH(created_at) as month"), DB::raw('count(*) as total'))
            ->groupBy('month')
            ->get();

        $orders = DB::table('orders')
            ->select(DB::raw("MONTH(created_at) as month"), DB::raw('sum(amount) as total'))
            ->groupBy('month')
            ->get();
        $initialData = collect([0,0,0,0,0,0,0,0,0,0,0,0]);
        return [
            'sewing_clients' => $initialData->mapWithKeys(static function($initialData,$key) use($sewing_clients) {
                $monthData = $sewing_clients->where('month','=',$key+1)->first();
                return [ $key+1 =>$monthData->total ?? $initialData];
            })->values()->all(),

            'students' => $initialData->mapWithKeys(static function($initialData,$key) use($students) {
                $monthData = $students->where('month','=',$key+1)->first();
                return [ $key+1 =>$monthData->total ?? $initialData];
            })->values()->all(),

            'teachers' => $initialData->mapWithKeys(static function($initialData,$key) use($teachers) {
                $monthData = $teachers->where('month','=',$key+1)->first();
                return [ $key+1 =>$monthData->total ?? $initialData];
            })->values()->all(),
            'sewing_workers' => $initialData->mapWithKeys(static function($initialData,$key) use($sewing_workers) {
                $monthData = $sewing_workers->where('month','=',$key+1)->first();
                return [ $key+1 =>$monthData->total ?? $initialData];
            })->values()->all(),
            'clubs' => $initialData->mapWithKeys(static function($initialData,$key) use($clubs) {
                $monthData = $clubs->where('month','=',$key+1)->first();
                return [ $key+1 =>$monthData->total ?? $initialData];
            })->values()->all(),
            'funerals' => $initialData->mapWithKeys(static function($initialData,$key) use($funerals) {
                $monthData = $funerals->where('month','=',$key+1)->first();
                return [ $key+1 =>$monthData->total ?? $initialData];
            })->values()->all(),
            'orders' => $initialData->mapWithKeys(static function($initialData,$key) use($orders) {
                $monthData = $orders->where('month','=',$key+1)->first();
                return [ $key+1 =>$monthData->total ?? $initialData];
            })->values()->all(),
        ];
    }
}
