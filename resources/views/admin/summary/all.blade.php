@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_header_title">
                      Summary
                  </div>
              </div>
          </div>
          <div class="card-body">
            <table id="allTableDesc" class="table table-bordered table-striped table-hover custom_table">
              <thead class="thead-dark">
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Source</th>
                  <th>Debit</th>
                  <th>Credit</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allIncome as $income)
                <tr>
                  <td>{{$income->income_date}}</td>
                  <td>{{$income->income_title}}</td>
                  <td>{{$income->incateInfo->incate_name}}</td>
                  <td>{{number_format($income->income_amount,2)}}</td>
                  <td>---</td>
                </tr>
                @endforeach
                @foreach($allExpense as $expense)
                <tr>
                  <td>{{$expense->expense_date}}</td>
                  <td>{{$expense->expense_title}}</td>
                  <td>{{$expense->expcateInfo->expcate_name}}</td>
                  <td>---</td>
                  <td>{{number_format($expense->expense_amount,2)}}</td>
                </tr>
                
                @endforeach
                <tr>
                  <th></th>
                  <th></th>
                  <th class="text-right">Total</th>
                  <th>{{number_format($totalIncome,2)}}</th>
                  <th>{{number_format($totalExpense,2)}}</th>
                </tr>
              </tbody>
              <tfoot class="thead-secondary">
                
                <tr>
                  <th class="text-center" colspan="5">
                    Total Savings : 
                    @if($totalIncome > $totalExpense)
                    <span style="color: green;">{{number_format($savings,2)}}</span>
                    @else
                    <span style="color: red;">{{number_format($savings,2)}}</span>
                    @endif
                  </th>
                 
                </tr>
              </tfoot>
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
    <form method="post" action="{{url('admin/income/softdelete')}}">
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
