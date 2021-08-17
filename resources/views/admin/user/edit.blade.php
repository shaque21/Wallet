@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{url('admin/user/update')}}">
          @csrf
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_header_title">
                        Update User Information
                    </div>
                    <div class="col-md-4 card_btn_part">
                        <a href="{{url('admin/user')}}" class="btn btn-sm btn-dark">All User Information</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
              @if(Session::has('success'))
                <script>
                  swal({ title: "Success!", text: "{{Session::get('success')}}", icon: "success", timer: 5000});
                </script>
              @endif
              @if(Session::has('error'))
                <script>
                  swal({ title: "Opps!", text: "{{Session::get('error')}}", icon: "error", timer: 5000});
                </script>
              @endif
              <input type="hidden" name="id" value="{{ $data->id }}">
              <input type="hidden" name="slug" value="{{ $data->slug }}">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label custom_form_label" for="name">Name :</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                </div>
              </div>
              <div class="form-group row {{$errors->has('name') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label custom_form_label"> User Role :<span class="req_star">*</span></label>
                <div class="col-sm-7">
                  @php
                    $allrole=App\Models\UserRole::where('role_status',1)->orderBy('role_name','ASC')->get();
                  @endphp
                  <select class="form-control custom_form_control" name="role">
                    <option value="">Select Role</option>
                    @foreach($allrole as $role)
                    <option value="{{$role->role_id}}"
                      {{ ($data->role == $role->role_id) ? 'selected' : '' }} >
                      {{$role->role_name}}
                    </option>
                    @endforeach
                  </select>
                  @if ($errors->has('name'))
                      <span class="error">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-md btn-success">SUBMIT</button>
            </div>
          </div>
      </form>
    </div>
</div>
@endsection
