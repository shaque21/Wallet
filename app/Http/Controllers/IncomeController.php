<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use Carbon\Carbon;
use Session;
use Auth;
use Illuminate\Support\Str;


class IncomeController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all = Income::where('income_status',1)->orderBy('income_id','DESC')->get();
      return view('admin.income.main.all',compact('all'));
    }

    public function add(){
      return view('admin.income.main.add');
    }

    public function edit($slug){
      $data=Income::where('income_status',1)->where('income_slug',$slug)->firstOrFail();
      return view('admin.income.main.edit',compact('data'));
    }

    public function view($slug){
      $data=Income::where('income_status',1)->where('income_slug',$slug)->firstOrFail();
      return view('admin.income.main.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
          'category'=>'required',
      ],[
          'category.required'=>'Please enter income category name!',
      ]);

      $slug ='I'.uniqid();
      $creator=Auth::user()->id;
      $insert = Income::insert([
        'income_title' => $request->title,
        'incate_id' => $request->category,
        'income_amount' => $request->amount,
        'income_date' => $request->date,
        'income_slug' =>$slug,
        'income_creator' =>$creator,
        'created_at' => Carbon::now()->toDateTimeString(),
      ]);
      if($insert){
        Session::flash('success','income information successfully saved.');
        return redirect('admin/income/add');
      }else{
        Session::flash('error','your operation failed!');
        return redirect('admin/income/add');
      }
    }

    public function update(Request $request){

      // return $request->all();
      $this->validate($request,[
        'category'=>'required',
      ],[
          'category.required'=>'Please enter income category name!',
      ]);
      $creator_update=Auth::user()->id;
      $update = Income::where('income_status',1)
                ->where('income_id',$request->income_id)
                ->update([
                  'income_title' => $request->title,
                  'incate_id' => $request->category,
                  'income_amount' => $request->amount,
                  'income_date' => $request->date,
                  'income_creator' => $creator_update,
                  'updated_at' => Carbon::now()->toDateTimeString(),

                ]);
      if($update){
        Session::flash('success','income information successfully updated.');
        return redirect('admin/income/view/'.$request->income_slug);
      }else{
        Session::flash('error','your operation failed!');
        return redirect('admin/income/view/'.$request->income_slug);
      }



    }

    public function softdelete(){
      $id=$_POST['modal_id'];
        $softDelete=Income::where('income_status',1)->where('income_id',$id)->update([
            'income_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($softDelete){
          Session::flash('success','income information is deleted.');
          return redirect('admin/income');
        }else{
          Session::flash('error','your operation failed!');
          return redirect('admin/income');
        }
    }

    public function restore(){
      $id=$_POST['modal_id'];
      $restore=Income::where('income_status',0)->where('income_id',$id)->update([
          'income_status'=>1,
          'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($restore){
        Session::flash('success','income information is deleted.');
        return redirect('admin/recycle/income');
      }else{
        Session::flash('error','your operation failed!');
        return redirect('admin/recycle/income');
      }
    }

    public function delete(){
      $id=$_POST['modal_id'];
      $del=Income::where('income_status',0)->where('income_id',$id)->delete();

      if($del){
        Session::flash('success','income information is deleted permanently.');
        return redirect('admin/recycle/income');
      }else{
        Session::flash('error','your operation failed!');
        return redirect('admin/recycle/income');
      }
    }
}
