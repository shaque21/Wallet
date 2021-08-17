@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_header_title">
                      View Expense Category Information
                  </div>
                  <div class="col-md-4 card_btn_part">
                      <a href="{{url('admin/expense/category')}}" class="btn btn-sm btn-dark">All Expense Category</a>
                  </div>
              </div>
          </div>
          <div class="card-body">
            @if(Session::has('success'))
              <script>
                swal({ title: "Success!", text: "{{Session::get('success')}}", icon: "success", timer: 5000});
              </script>
            @endif
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <table class="table table-bordered table-striped table-hover custom_view_table">
                      <tr>
                        <td>Category Name</td>
                        <td>:</td>
                        <td>{{$data->expcate_name}}</td>
                      </tr>
                      <tr>
                        <td>Category Remarks</td>
                        <td>:</td>
                        <td>{{$data->expcate_remarks}}</td>
                      </tr>
                      <tr>
                        <td>Create Time</td>
                        <td>:</td>
                        <td>{{$data->created_at->format('d-m-Y')}}</td>
                      </tr>
                  </table>
                </div>
                <div class="col-md-2"></div>
            </div>

          </div>
          <div class="card-footer">
              <a href="#" class="btn btn-sm btn-info">Print</a>
              <a href="#" class="btn btn-sm btn-dark">PDF</a>
              <a href="#" class="btn btn-sm btn-success">Excel</a>
          </div>
        </div>
    </div>
</div>
@endsection
