<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
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
        $students_count = DB::table('students')->count();
        $teachers_count = DB::table('teachers')->count();
        $sc_count = DB::table('sewing_clients')->count();
        $sw_count = DB::table('sewing_workers')->count();
        $clubs_count = DB::table('clubs')->count();
        $gs_count = DB::table('general_statistics')->count();
        $f_count = DB::table('funerals')->count();

        return view('welcome',
            compact(
                'sc_count',
                'sw_count',
                'teachers_count',
                'students_count',
                'clubs_count',
                'gs_count',
                'f_count'
            ));
    }
}
