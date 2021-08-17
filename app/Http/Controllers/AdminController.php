<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $months = User::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $data = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month){
            $month = $month - 1;
            $data[$month] = $users[$index];
        }
      return view('admin.dashboard.index',compact('data'));
    }

    public function test(){
        echo "Testing";
    }
}
