<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Image;
use Illuminate\Support\Str;
use App\Rules\MatchOldPassword;

class UserController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
        $allUser=User::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.user.all',compact('allUser'));
    }

    public function add(){
      return view('admin.user.add');
    }

    public function profile(){
      return view('admin.user.profile.user');
    }

    public function edit($slug){
      $data=User::where('status',1)->where('slug',$slug)->firstOrFail();
      return view('admin.user.edit',compact('data'));
    }

    public function view($slug){
      $data=User::where('status',1)->where('slug',$slug)->firstOrFail();
      return view('admin.user.view',compact('data'));
    }

    public function fullProfile($slug){
      $data=User::where('status',1)->where('slug',$slug)->firstOrFail();
      return view('admin.user.profile.full',compact('data'));
    }

    public function editPassword($slug){
      $users=User::where('status',1)->where('slug',$slug)->firstOrFail();
      return view('admin.user.profile.edit_password',compact('users'));
    }

    public function editProfile($slug){
      $users = User::where('status',1)
                    ->where('slug',$slug)->firstOrFail();
        return view('admin.user.profile.edit-profile',compact('users'));
    }

    public function password_update(Request $request){
      // return $request->all();
      $request->validate([
        'current_password' => ['required', new MatchOldPassword],
        'new_password' => ['required'],
        'password_confirmation' => ['same:new_password'],
        
      ],[

      ]);

      $update = User::find($request->id)->update(['password'=> Hash::make($request->new_password)]);
      
      if($update){
          Session::flash('update_success','Password Updated Successfully !');
          return redirect('user/edit-password/'.$request->slug);
      }
      else{
          Session::flash('update_error','Something were wrong');
          return redirect('user/edit-password/'.$request->slug);
      }
    }

    public function profile_update(Request $request){
      // return $request->all();
      $request->validate([
        'name'=>'required|max:70|min:5',
        'phone'=>'required',
        'email' => 'required|string|email|max:255',
        'photo'=>'mimes:jpeg,jpg,png,gif',
      ],[
          'name.required'=>'The name field is required!'
      ]);

      $url_slug = Str::of($request->name)->slug('-');
      $data = [
          'name'=>$request->name,
          'email'=>$request->email,
          'phone'=>$request->phone,
          'slug'=>$url_slug,
          'updated_at'=>Carbon::now()->toDateTimeString(),
      ];
      // upload Image
      if($request->hasFile('photo')){
          $image = $request->file('photo');
          $image_name = $url_slug.'('.$request->id.')'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(250,250)->save(base_path('public/uploads/users/'.$image_name));
          $data['photo'] = $image_name;
      }
      $update = User::where('status',1)->where('id',$request->id)->update($data);
      if($update){
          Session::flash('update_success','My Information Updated Successfully !');
          return redirect('user/full-profile/'.$url_slug);
      }
      else{
          Session::flash('update_error','Something were wrong');
          return redirect('user/edit-profile/'.$request->slug);
      }
    }

    public function insert(Request $request){
      $this->validate($request,[
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
        'role' => 'required',
      ],[
        'name.required'=>'Please enter name!'
      ]);

      $slug='U'.uniqid(20);
      $insert=User::insertGetId([
        'name'=>$request->name,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'role'=>$request->role,
        'slug'=>$slug,
        'created_at'=>Carbon::now()->toDateTimeString()
      ]);

      if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='user_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(250,250)->save(base_path('public/uploads/users/'.$imageName));

          User::where('id',$insert)->update([
              'photo'=>$imageName,
              'updated_at'=>Carbon::now()->toDateTimeString(),
          ]);
      }

      if($insert){
        Session::flash('success','value');
        return redirect('admin/user');
      }else{
        Session::flash('error','value');
        return redirect('admin/user/add');
      }
    }

    public function update(Request $request){
      $this->validate($request,[
        'role' => 'required',
      ],[
        'role.required'=>'Please select the role!'
      ]);
      $update = User::where('status',1)
                ->where('id',$request->id)
                ->update([
                  'name' => $request->name,
                  'role' => $request->role,
                  'updated_at' => Carbon::now()->toDateTimeString(),
                ]);
      if($update){
        Session::flash('success','User Information updated successfully.');
        return redirect('admin/user/edit/'.$request->slug);
      }else{
        Session::flash('success','Whoops! something wrong.');
        return redirect('admin/user/edit/'.$request->slug);
      }
    }

    public function softdelete(){
      $id=$_POST['modal_id'];
        $softDelete=User::where('status',1)->where('id',$id)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($softDelete){
          Session::flash('success','user information is deleted.');
          return redirect('admin/user');
        }else{
          Session::flash('error','your operation failed!');
          return redirect('admin/user');
        }
    }

    public function restore(){
      $id=$_POST['modal_id'];
      $restore=User::where('status',0)->where('id',$id)->update([
          'status'=>1,
          'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($restore){
        Session::flash('success','user information is deleted.');
        return redirect('admin/recycle/user');
      }else{
        Session::flash('error','your operation failed!');
        return redirect('admin/recycle/user');
      }
    }

    public function delete(){
      $id=$_POST['modal_id'];
      $del=User::where('status',0)->where('id',$id)->delete();

      if($del){
        Session::flash('success','user information is deleted permanently.');
        return redirect('admin/recycle/user');
      }else{
        Session::flash('error','your operation failed!');
        return redirect('admin/recycle/user');
      }
    }

}
