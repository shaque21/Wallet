@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{url('admin/income/update')}}">
          @csrf
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_header_title">
                        Update Income Information
                    </div>
                    <div class="col-md-4 card_btn_part">
                        <a href="{{url('admin/income')}}" class="btn btn-sm btn-dark">All Income</a>
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
              <input type="hidden" name="income_id" value="{{ $data->income_id }}">
              <input type="hidden" name="income_slug" value="{{ $data->income_slug }}">
              <div class="form-group row {{$errors->has('title') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label custom_form_label">Income Title:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control custom_form_control" name="title" value="{{ $data->income_title }}">
                </div>
              </div>
              <div class="form-group row {{$errors->has('name') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label custom_form_label"> Income Category:<span class="req_star">*</span></label>
                <div class="col-sm-7">
                  @php
                    $allCate=App\Models\IncomeCategory::where('incate_status',1)->orderBy('incate_name','ASC')->get();
                  @endphp
                  <select class="form-control custom_form_control" name="category">
                    <option value="">select category</option>
                    @foreach($allCate as $cate)
                    <option value="{{$cate->incate_id}}"
                      {{ ($data->incate_id == $cate->incate_id) ? 'selected' : '' }} >
                      {{$cate->incate_name}}
                    </option>
                    @endforeach
                  </select>
                  @if ($errors->has('name'))
                      <span class="error">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group row {{$errors->has('name') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label custom_form_label">Income Amount:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control custom_form_control" name="amount" value="{{ $data->income_amount }}">
                </div>
                @if ($errors->has('name'))
                    <span class="error">{{ $errors->first('name') }}</span>
                @endif
              </div>
              <div class="form-group row {{$errors->has('name') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label custom_form_label">Income Date:</label>
                <div class="col-sm-7">
                  <input type="text" id="myDatePicker" class="form-control custom_form_control" name="date" value="{{ $data->income_date }}">
                </div>
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
