<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Carbon\Carbon;
use Session;
use Auth;

class ExpenseController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all = Expense::where('expense_status',1)->orderBy('expense_id','DESC')->get();
      return view('admin.expense.main.all',compact('all'));
    }

    public function add(){
      return view('admin.expense.main.add');
    }

    public function edit($slug){
      $data=Expense::where('expense_status',1)->where('expense_slug',$slug)->firstOrFail();
      return view('admin.expense.main.edit',compact('data'));
    }

    public function view($slug){
      $data=Expense::where('expense_status',1)->where('expense_slug',$slug)->firstOrFail();
      return view('admin.expense.main.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'category'=>'required',
      ],[
          'category.required'=>'Please enter income category name!',
      ]);

      $slug ='E'.uniqid();
      $creator=Auth::user()->id;
      $insert = Expense::insert([
        'expense_title' => $request->title,
        'expcate_id' => $request->category,
        'expense_amount' => $request->amount,
        'expense_date' => $request->date,
        'expense_slug' =>$slug,
        'expense_creator' =>$creator,
        'created_at' => Carbon::now()->toDateTimeString(),
      ]);
      if($insert){
        Session::flash('success','expense information successfully saved.');
        return redirect('admin/expense/add');
      }else{
        Session::flash('error','your operation failed!');
        return redirect('admin/expense/add');
      }
    }

    public function update(Request $request){
      $this->validate($request,[
        'category'=>'required',
      ],[
          'category.required'=>'Please enter expense category name!',
      ]);
      $creator_update=Auth::user()->id;
      $update = Expense::where('expense_status',1)
                ->where('expense_id',$request->expense_id)
                ->update([
                  'expense_title' => $request->title,
                  'expcate_id' => $request->category,
                  'expense_amount' => $request->amount,
                  'expense_date' => $request->date,
                  'expense_creator' => $creator_update,
                  'updated_at' => Carbon::now()->toDateTimeString(),

                ]);
      if($update){
        Session::flash('success','expense information successfully updated.');
        return redirect('admin/expense/view/'.$request->expense_slug);
      }else{
        Session::flash('error','your operation failed!');
        return redirect('admin/expense/view/'.$request->expense_slug);
      }
    }

    public function softdelete(){
      $id=$_POST['modal_id'];
        $softDelete=Expense::where('expense_status',1)->where('expense_id',$id)->update([
            'expense_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($softDelete){
          Session::flash('success','expense information is deleted.');
          return redirect('admin/expense');
        }else{
          Session::flash('error','your operation failed!');
          return redirect('admin/expense');
        }
    }

    public function restore(){
      $id=$_POST['modal_id'];
      $restore=Expense::where('expense_status',0)->where('expense_id',$id)->update([
          'expense_status'=>1,
          'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($restore){
        Session::flash('success','expense information is deleted.');
        return redirect('admin/recycle/expense');
      }else{
        Session::flash('error','your operation failed!');
        return redirect('admin/recycle/expense');
      }
    }

    public function delete(){
      $id=$_POST['modal_id'];
      $del=Expense::where('expense_status',0)->where('expense_id',$id)->delete();

      if($del){
        Session::flash('success','expense information is deleted permanently.');
        return redirect('admin/recycle/expense');
      }else{
        Session::flash('error','your operation failed!');
        return redirect('admin/recycle/expense');
      }
    }
}
