@extends('layouts.admin')
@section('content')
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Dashboard</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Home</a></li>
                <li>Dashboard</li>
            </ul>
        </div>	
        <!-- Card -->
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-12">
                <div class="widget-card widget-bg1">					 
                    <div class="wc-item">
                        <h4 class="wc-title">
                            Cantidad de enlaces
                        </h4>
                        <span class="wc-des">
                            Numero de enlaces publicados
                        </span>
                        <span class="wc-stats">
                            <span class="counter">
                                @foreach ($number_of_links as $number_of_link)
                                {{$number_of_link['count']}}
                                @endforeach
                            </span>
                        </span>		
                        {{--  <div class="progress wc-progress">
                            <div class="progress-bar" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>  --}}
                        {{--  <span class="wc-progress-bx">
                            <span class="wc-change">
                                Activos
                            </span>
                            <span class="wc-number ml-auto">
                                78%
                            </span>
                        </span>  --}}
                    </div>				      
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-12">
                <div class="widget-card widget-bg2">					 
                    <div class="wc-item">
                        <h4 class="wc-title">
                            Cantidad de visitas
                        </h4>
                        <span class="wc-des">
                            Suma todas las visitas
                        </span>
                        <span class="wc-stats counter">
                            @foreach ($number_of_links as $number_of_link)
                                {{$number_of_link['count']}}
                            @endforeach
                        </span>		
                        {{--  <div class="progress wc-progress">
                            <div class="progress-bar" role="progressbar" style="width: 88%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>  --}}
                        {{--  <span class="wc-progress-bx">
                            <span class="wc-change">
                                Cambios
                            </span>
                            <span class="wc-number ml-auto">
                                88%
                            </span>
                        </span>  --}}
                    </div>				      
                </div>
            </div>
            
        </div>
        <!-- Card END -->
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Numero de visitas de los últimos 7 días</h4>
                    </div>
                    <div class="widget-inner">
                        <canvas id="chart" width="100" height="45"></canvas>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</main>
@endsection
@push('scripts')
<script>
    var ctx = document.getElementById('chart').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'line',

        // The data for our dataset
        data: {
           
            labels: [<?php foreach ($visits_per_day as $visit_per_day)
                {
                    $dia = $visit_per_day->date;
                    echo '"'. $dia.'",';} ?>],

            // Information about the dataset
            datasets: [{
                label: "Views",
                backgroundColor: 'rgba(0,0,0,0.05)',
                borderColor: '#4c1864',
                borderWidth: "3",
                data: [<?php foreach ($visits_per_day as $reg)
                {echo ''. $reg->visits.',';} ?>],
                pointRadius: 4,
                pointHoverRadius:4,
                pointHitRadius: 10,
                pointBackgroundColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointBorderWidth: "3",
            }]
        },

        // Configuration options
        options: {

            layout: {
            padding: 0,
            },

            legend: { display: false },
            title:  { display: false },

            scales: {
                yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
                }]
              },

            tooltips: {
            backgroundColor: '#333',
            titleFontSize: 12,
            titleFontColor: '#fff',
            bodyFontColor: '#fff',
            bodyFontSize: 12,
            displayColors: false,
            xPadding: 10,
            yPadding: 10,
            intersect: false
            }
        },
    });
</script>
@endpush