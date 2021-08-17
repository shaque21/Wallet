@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ url('user/profile/profile_update')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h2 class="text-uppercase text-dark font-weight-bold">
                                Update My Information
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
                
                @if (Session::has('update_error'))
                    <script>
                        swal({title: "Opps!",text: "{{ Session::get('update_error') }}",
                            icon: "error",timer: 4000
                            });
                    </script>
                @endif
                <div class="card-body">
                    <input type="hidden" name="id" id="id" value="{{ $users->id }}">
                    <input type="hidden" name="slug" id="slug" value="{{ $users->slug }}">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label custom_form_label">
                            Full Name :<span class="req_star">*</span>
                        </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control custom_form_control" name="name" value="{{ $users->name }}">
                            @error('name')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label custom_form_label">
                            E-mail Address :<span class="req_star">*</span>
                        </label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control custom_form_control" name="email" value="{{ $users->email }}">
                            @error('email')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label custom_form_label">
                            Phone :<span class="req_star">*</span>
                        </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control custom_form_control" name="phone" value="{{ $users->phone }}">
                          @error('phone')
                                <span class="alert alert-danger">{{ $message }}</span>
                         @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label custom_form_label">
                            Photo :
                        </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control custom_form_control"  name="photo" onchange="previewFile(this);">
                            
                            @if ($users->photo != '')
                            <img id="previewImg" src="{{ asset('uploads/users/'.$users->photo) }}" alt="Photo" width="150px">
                            @else
                            <img id="previewImg" src="{{ asset('uploads/avatar.jpg') }}" alt="Photo" width="150px">
                            @endif
                            @error('photo')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
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
@section('script')
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection