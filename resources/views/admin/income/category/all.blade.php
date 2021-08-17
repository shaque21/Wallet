@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_header_title">
                      All Income Category Information
                  </div>
                  <div class="col-md-4 card_btn_part">
                      <a href="{{url('admin/income/category/add')}}" class="btn btn-sm btn-dark">Add Income Category</a>
                  </div>
              </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped table-hover custom_table">
              <thead class="thead-dark">
                <tr>
                  <th>Category Name</th>
                  <th>Remarks</th>
                  <th>Created Time</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allData as $data)
                <tr>
                  <td>{{$data->incate_name}}</td>
                  <td>{{$data->incate_remarks}}</td>
                  <td>{{$data->created_at->format('d-m-Y | h:i:s A')}}</td>
                  <td>
                      <a href="{{url('admin/income/category/view/'.$data->incate_slug)}}"><i class="fa fa-plus-square fa-lg view_icon"></i></a>
                      <a href="{{url('admin/income/category/edit/'.$data->incate_slug)}}"><i class="fa fa-pencil-square fa-lg edit_icon"></i></a>
                      <a href="#" id="softDelete" data-toggle="modal" data-target="#softDeleteModal" data-id="{{$data->incate_id}}"><i class="fa fa-trash fa-lg delete_icon"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              </table>
          </div>
          <div class="card-footer">
              <a href="#" class="btn btn-sm btn-info">Print</a>
              <a href="#" class="btn btn-sm btn-dark">PDF</a>
              <a href="#" class="btn btn-sm btn-success">Excel</a>
          </div>
        </div>
    </div>
</div>

<!-- softdelete modal code start -->
<div class="modal fade" id="softDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="{{url('admin/income/category/softdelete')}}">
      @csrf
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-gg-circle"></i> Confirm Message</h5>
      </div>
      <div class="modal-body modal_body">
        Are you want to sure delete data?
        <input type="hidden" name="modal_id" id="modal_id">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark">Confirm</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection
