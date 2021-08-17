<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Income;
use App\Models\Expense;
use Carbon\Carbon;
use Session;
use Auth;

class SummaryController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $allIncome=Income::where('income_status',1)->orderBy('income_id','DESC')->get();
      $totalIncome=Income::where('income_status',1)->sum('income_amount');
      $allExpense=Expense::where('expense_status',1)->orderBy('expense_id','DESC')->get();
      $totalExpense=Expense::where('expense_status',1)->sum('expense_amount');
      $savings = $totalIncome - $totalExpense;
      return view('admin.summary.all',compact('allIncome','allExpense','totalIncome','totalExpense','savings'));
    }
}
