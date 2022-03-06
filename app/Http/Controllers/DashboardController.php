<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'permission:dashboard',
        ]);
    }
    public function index(){
        if (auth()->user()->hasRole('Client')) {
            $visits_per_day = auth()->user()->posts()->select(
                DB::raw("count(*) as count"),
                DB::raw("SUM(visits) as visits"),
                DB::raw("DATE_FORMAT(created_at,'%D %M %Y') as date")
            )->groupBy('date')->take(7)->get();
            $number_of_links = auth()->user()->posts()->select(
                DB::raw("count(*) as count"),
                DB::raw("SUM(visits) as visits"),
                DB::raw("DATE_FORMAT(created_at,'%Y') as date")
            )->groupBy('date')->take(7)->get();

        } else {
            $visits_per_day = Post::select(
                DB::raw("count(*) as count"),
                DB::raw("SUM(visits) as visits"),
                DB::raw("DATE_FORMAT(created_at,'%D %M %Y') as date")
            )->groupBy('date')->take(7)->get();
            $number_of_links = Post::select(
                DB::raw("count(*) as count"),
                DB::raw("SUM(visits) as visits"),
                DB::raw("DATE_FORMAT(created_at,'%Y') as date")
            )->groupBy('date')->take(7)->get();
        }
        // $number_of_links
        // $total_number_of_visits
        return view('admin.index',compact('visits_per_day', 'number_of_links'));
    }
}
