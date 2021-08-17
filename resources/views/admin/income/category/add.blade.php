@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{url('admin/income/category/submit')}}">
          @csrf
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_header_title">
                        Add Income Category Information
                    </div>
                    <div class="col-md-4 card_btn_part">
                        <a href="{{url('admin/income/category')}}" class="btn btn-sm btn-dark">All Income Category</a>
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
                <label class="col-sm-3 col-form-label custom_form_label">Category Name:<span class="req_star">*</span></label>
                <div class="col-sm-7">
                  <input type="text" class="form-control custom_form_control" name="name" value="{{old('name')}}">
                  @if ($errors->has('name'))
                      <span class="error">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label custom_form_label">Remarks:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control custom_form_control" name="remarks" value="{{old('remarks')}}">
                </div>
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
