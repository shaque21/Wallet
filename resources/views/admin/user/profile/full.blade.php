@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h2 class="text-uppercase text-dark font-weight-bold">
                            My Informations
                        </h2>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <a href="{{ url('user/edit-password/'.$data->slug) }}" class="btn btn-secondary btn-sm font-weight-bold text-uppercase">
                            <i class="fa fa-key"></i>&nbsp 
                            Update Password
                        </a>
                        <a href="{{ url('user/edit-profile/'.$data->slug) }}" class="ml-2 btn btn-dark btn-sm font-weight-bold text-uppercase">
                            <i class="fa fa-edit"></i>&nbsp 
                            Update My Account
                        </a>
                    </div>
                </div>
            </div>
            @if (Session::has('update_success'))
                <script>
                    swal({title: "Well Done!",text: "{{ Session::get('update_success') }}",
                        icon: "success",timer: 4000
                        });
                </script>
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-4 mb-sm-5" style="height: auto">
                        @if ($data->photo != '')
                            <img src="{{ asset('uploads/users/'.$data->photo) }}" alt="Photo" class="container-fluid avatar-img rounded" height="auto">
                        @else
                            <img src="{{ asset('uploads/avatar.jpg') }}" alt="Photo" class="container-fluid avatar-img rounded" >
                        @endif
                    </div>
                </div>
                <div class="col-md-8 offset-2">
                    <table class="table table-bordered table-hover table-striped custom_view_table">
                        <tr>
                            <td>Full Name</td>
                            <td>:</td>
                            <td>{{ $data->name }}</td>
                        </tr>
                        <tr>
                            <td>E-mail Address</td>
                            <td>:</td>
                            <td>{{ $data->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>{{ $data->phone }}</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>:</td>
                            <td>
                                <span class="badge badge-secondary">{{ $data->roleInfo->role_name }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Create Time</td>
                            <td>:</td>
                            <td>{{ $data->created_at->format('d M Y | h:i:s A') }}</td>
                        </tr>
                        @if (isset($data->updated_at))
                            <tr>
                                <td>Updated Time</td>
                                <td>:</td>
                                <td>{{ $data->updated_at->format('d M Y | h:i:s A') }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection