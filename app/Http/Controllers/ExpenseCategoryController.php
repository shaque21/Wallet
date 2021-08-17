<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ExpenseCategory;
use Carbon\Carbon;
use Session;
use Auth;

class ExpenseCategoryController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $allData=ExpenseCategory::where('expcate_status',1)->orderBy('expcate_id','DESC')->get();
    return view('admin.expense.category.all',compact('allData'));
  }

  public function add(){
    return view('admin.expense.category.add');
  }

  public function edit($slug){
    $data=where('expcate_status',1)->where('expcate_slug',$slug)->first();
    return view('admin.expense.category.edit',compact('data'));
  }

  public function view($slug){
    $data=where('expcate_status',1)->where('expcate_slug',$slug)->first();
    return view('admin.expense.category.view',compact('data'));
  }
  public function insert(Request $request){
    $this->validate($request,[
      'name'=>'required',

    ],[
      'name.requied'=>'Enter expense category name',
      'name.unique'=>'Enter unique expense category name',
    ]);

    $slug = Str::of($request['name'])->slug('-');
    $insert=ExpenseCategory::insert([
      'expcate_name'=>$request->name,
      'expcate_remarks'=>$request->remarks,
      'expcate_slug'=>$slug,
      'created_at'=>Carbon::now()->toDateTimeString()
    ]);

    if($insert){
      Session::flash('success','Expense category updated successfully!');
      return redirect('admin/expense/category/add');
    }else{
      Session::flash('error','your operation failed!');
      return redirect('admin/expense/category/add');
    }
  }

  public function update(){

  }

  public function softdelete(){

  }

  public function restore(){

  }

  public function delete(){

  }

}
