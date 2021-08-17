@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{url('admin/user/submit')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_header_title">
                        User Registration
                    </div>
                    <div class="col-md-4 card_btn_part">
                        <a href="{{url('admin/user')}}" class="btn btn-sm btn-dark">All User</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
              @if(Session::has('success'))
                <script>
                  swal({ title: "Success!", text: "income category created successfully!", icon: "success", timer: 5000});
                </script>
              @endif
              @if(Session::has('error'))
                <script>
                  swal({ title: "Opps!", text: "your operation failed!", icon: "error", timer: 5000});
                </script>
              @endif
              <div class="form-group row {{$errors->has('name') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label custom_form_label">Name:<span class="req_star">*</span></label>
                <div class="col-sm-7">
                  <input type="text" class="form-control custom_form_control" name="name" value="{{old('name')}}">
                  @if ($errors->has('name'))
                      <span class="error">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label custom_form_label">Phone:<span class="req_star">*</span></label>
                <div class="col-sm-7">
                  <input type="text" class="form-control custom_form_control" name="phone" value="{{old('phone')}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label custom_form_label">Email:<span class="req_star">*</span></label>
                <div class="col-sm-7">
                  <input type="email" class="form-control custom_form_control" name="email" value="{{old('email')}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label custom_form_label">Password:<span class="req_star">*</span></label>
                <div class="col-sm-7">
                  <input type="password" class="form-control custom_form_control" name="password" value="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label custom_form_label">Confirm-Password:</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control custom_form_control" id="password_confirmation" name="password_confirmation" value="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label custom_form_label">User Role:<span class="req_star">*</span></label>
                <div class="col-sm-7">
                  @php
                    $allRole=App\Models\UserRole::where('role_status',1)->orderBY('role_id','ASC')->get();
                  @endphp
                  <select class="form-control custom_form_control" name="role">
                    <option value="">Select Role</option>
                    @foreach($allRole as $urole)
                    <option value="{{$urole->role_id}}">{{$urole->role_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label custom_form_label">Photo:</label>
                <div class="col-sm-7">
                  <input type="file" id="upload" name="pic"><br/>
                  <img id="view_img" class="img-fluid img-thumbnail" src="{{asset('uploads/avatar.jpg')}}" alt="">
                </div>
              </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-md btn-success">REGISTRATION</button>
            </div>
          </div>
      </form>
    </div>
</div>
@endsection
