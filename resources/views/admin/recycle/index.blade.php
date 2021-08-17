@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-sm-6 col-md-3">
    <a href="{{url('admin/recycle/user')}}" style="text-decoration:none">
      <div class="card card-stats card-round">
        <div class="card-body ">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-primary bubble-shadow-small">
                <i class="fa fa-users"></i>
              </div>
            </div>
            <div class="col col-stats ml-3 ml-sm-0">
              @php
                  $totalUser=App\Models\User::where('status',0)->count();
              @endphp
              <div class="numbers">
                <p class="card-category">Users</p>
                <h4 class="card-title">
                  @if($totalUser < 10)
                    0{{$totalUser}}
                  @else
                    {{$totalUser}}
                  @endif
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-sm-6 col-md-3">
    <a href="{{url('admin/recycle/income/category')}}">
      <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div class="icon-big text-center icon-info bubble-shadow-small">
              <i class="fa fa-hourglass"></i>
            </div>
          </div>
          <div class="col col-stats ml-3 ml-sm-0">
            @php
                $totalIncomeCate=App\Models\IncomeCategory::where('incate_status',0)->count();
            @endphp
            <div class="numbers">
              <p class="card-category">Income Category</p>
              <h4 class="card-title">
                @if($totalIncomeCate < 10)
                  0{{$totalIncomeCate}}
                @else
                  {{$totalIncomeCate}}
                @endif
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class="col-sm-6 col-md-3">
    <a href="{{url('admin/recycle/income')}}" style="text-decoration:none">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-success bubble-shadow-small">
                <i class="fa fa-gift"></i>
              </div>
            </div>
            <div class="col col-stats ml-3 ml-sm-0">
              <div class="numbers">
                @php
                  $totalIncome=App\Models\Income::where('income_status',0)->count();
                @endphp
                <p class="card-category">Income</p>
                <h4 class="card-title">
                  @if($totalIncome < 10)
                    0{{$totalIncome}}
                  @else
                    {{$totalIncome}}
                  @endif
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-sm-6 col-md-3">
    <a href="{{url('admin/recycle/expense')}}" style="text-decoration:none">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-success bubble-shadow-small">
                <i class="fa fa-ils"></i>
              </div>
            </div>
            <div class="col col-stats ml-3 ml-sm-0">
              <div class="numbers">
                @php
                  $totalExpense=App\Models\Expense::where('expense_status',0)->count();
                @endphp
                <p class="card-category">Expense</p>
                <h4 class="card-title">
                  @if($totalExpense < 10)
                    0{{$totalExpense}}
                  @else
                    {{$totalExpense}}
                  @endif
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>
@endsection
