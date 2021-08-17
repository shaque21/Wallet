@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-sm-6 col-md-3">
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
                $totalUser=App\Models\User::where('status',1)->count();
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
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div class="icon-big text-center icon-info bubble-shadow-small">
              <i class="far fa-newspaper"></i>
            </div>
          </div>
          <div class="col col-stats ml-3 ml-sm-0">
            <div class="numbers">
              <p class="card-category">Subscribers</p>
              <h4 class="card-title">1303</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div class="icon-big text-center icon-success bubble-shadow-small">
              <i class="far fa-chart-bar"></i>
            </div>
          </div>
          <div class="col col-stats ml-3 ml-sm-0">
            <div class="numbers">
              <p class="card-category">Sales</p>
              <h4 class="card-title">$ 1,345</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div class="icon-big text-center icon-secondary bubble-shadow-small">
              <i class="far fa-check-circle"></i>
            </div>
          </div>
          <div class="col col-stats ml-3 ml-sm-0">
            <div class="numbers">
              <p class="card-category">Order</p>
              <h4 class="card-title">576</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-5">
  <div class="col-sm-10 offset-1">
    <div id="chart-container">

    </div>
  </div>
</div>
<div class="row mt-5">
  <div class="col-sm-10 offset-1">
    <canvas id="barChart"></canvas>
  </div>
</div>
@endsection
@section('script')
    <script>
      var data = <?php echo json_encode($data); ?>;

      Highcharts.chart('chart-container',{
        title:{
          text:"New User Grouth, 2021"
        },
        subtitle:{
          text:"Source: High Charts "
        },
        xAxis:{
          categories:['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec']
        },
        yAxis:{
          title:{
            text:"Number Of New User"
          }
        },
        legend:{
          layout:'vertical',
          align:'right',
          verticalAlign:'middle'
        },
        plotOptions:{
          series:{
            allowPointSelect:true
          }
        },
        series:[{
          name:"New User",
          data:data,
        }],
        responsive:{
          rules:[{
            condition:{
              maxwidth:500
            },
            chartOptions:{
              legend:{
                layout:'horizontal',
                align:'center',
                verticalAlign:'bottom'
              }
            }
          }]
        }
      })

      $(function(){
        var data = <?php echo json_encode($data); ?>;
        var barCanvas = $('#barChart');
        var barChart = new Chart(barCanvas,{
          type:'bar',
          data:{
            labels:['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec'],
            datasets:[
              {
                label:"New User Growth,2021",
                data:data,
                backgroundColor:[
                  'red','yellow','blue','violet','green','pink','indigo','orange','gold','lightblue','purple','silver'
                ]
              }
            ]
          },
          options:{
            scales:{
              yAxis:[{
                ticks:{
                  beginAtZero:true
                }
              }]
            }
          }
        })
      })
    </script>
@endsection
