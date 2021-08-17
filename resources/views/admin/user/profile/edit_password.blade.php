@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ url('user/profile/password_update')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h2 class="text-uppercase text-dark font-weight-bold">
                                Update Password
                            </h2>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a href="{{ url('user/full-profile/'.$users->slug) }}" class="btn btn-dark font-weight-bold text-uppercase">
                                <i class="fa fa-user"></i>&nbsp; 
                                My Profile 
                            </a>
                        </div>
                    </div>
                </div>
                @if (Session::has('update_success'))
                    <script>
                        swal({title: "Well",text: "{{ Session::get('update_success') }}",
                            icon: "success",timer: 4000
                            });
                    </script>
                @endif
                @if (Session::has('update_error'))
                    <script>
                        swal({title: "Opps!",text: "{{ Session::get('update_error') }}",
                            icon: "error",timer: 4000
                            });
                    </script>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 offset-1">
                            <input type="hidden" name="id" id="id" value="{{ $users->id }}">
                            <input type="hidden" name="slug" id="slug" value="{{ $users->slug }}">
                            
                            <div class="form-group row">
                                <label for="current_password" class="col-sm-2 col-form-label custom_form_label">
                                    Current Password :<span class="req_star">*</span>
                                </label>
                                <div class="col-sm-8">
                                <input type="password" class="form-control custom_form_control" name="current_password" placeholder="Current Password">
                                @error('current_password')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_password" class="col-sm-2 col-form-label custom_form_label">
                                    New Password :<span class="req_star">*</span>
                                </label>
                                <div class="col-sm-8">
                                <input type="password" class="form-control custom_form_control" name="new_password" placeholder="New Password">
                                @error('new_password')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-2 col-form-label custom_form_label">
                                    Confirm-password :
                                </label>
                                <div class="col-sm-8">
                                <input type="password" id="password_confirmation" class="form-control custom_form_control" name="password_confirmation" placeholder="Confirm-Password">
                                @error('password_confirmation')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div> 
                        </div>
                        </div>
                    </div>
                <div class="card-footer text-center">
                    <button class="btn btn-success font-weight-bold text-uppercase" type="submit">submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection