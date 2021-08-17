<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\IncomeCategory;
use Carbon\Carbon;
use Session;

class IncomeCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $allData=IncomeCategory::where('incate_status',1)->orderBY('incate_name','ASC')->get();
        return view('admin.income.category.all',compact('allData'));
    }

    public function add(){
        return view('admin.income.category.add');
    }

    public function edit($slug){
        $data=IncomeCategory::where('incate_status',1)->where('incate_slug',$slug)->firstOrFail();
        return view('admin.income.category.edit',compact('data'));
    }

    public function view($slug){
        $data=IncomeCategory::where('incate_status',1)->where('incate_slug',$slug)->firstOrFail();
        return view('admin.income.category.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:50',
        ],[
            'name.required'=>'Please enter income category name!',
        ]);

        $slug = Str::of($request['name'])->slug('-');
        $insert=IncomeCategory::insert([
          'incate_name'=>$request->name,
          'incate_remarks'=>$request->remarks,
          'incate_slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($insert){
          Session::flash('success','income category updated successfully!');
          return redirect('admin/income/category/add');
        }else{
          Session::flash('error','your operation failed!');
          return redirect('admin/income/category/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:50',
        ],[
            'name.required'=>'Please enter income category name!',
        ]);

        $id =$request->id;
        $slug =$request->slug;
        $update=IncomeCategory::where('incate_status',1)->where('incate_id',$id)->update([
          'incate_name'=>$request->name,
          'incate_remarks'=>$request->remarks,
          'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($update){
          Session::flash('success','income category updated successfully!');
          return redirect('admin/income/category/view/'.$slug);
        }else{
          Session::flash('error','your operation failed!');
          return redirect('admin/income/category/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $softdel=IncomeCategory::where('incate_status',1)->where('incate_id',$id)->update([
            'incate_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($softdel){
          return redirect('admin/income/category');
        }else{
          return redirect('admin/income/category');
        }
    }

    public function restore(){
      $id=$_POST['modal_id'];
      $restore=IncomeCategory::where('incate_status',0)->where('incate_id',$id)->update([
          'incate_status'=>1,
          'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($restore){
        return redirect('admin/recycle/income/category');
      }else{
        return redirect('admin/recycle/income/category');
      }
    }

    public function delete(){
      $id=$_POST['modal_id'];
      $del=IncomeCategory::where('incate_status',0)->where('incate_id',$id)->delete();

      if($del){
        return redirect('admin/recycle/income/category');
      }else{
        return redirect('admin/recycle/income/category');
      }
    }
}
