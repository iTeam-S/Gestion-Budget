@extends('layouts.user_type.auth')

@section('content')
<div class="mt-4">
    <div class="mb-4">
        <div>
            <h1>Journals</h1>
            <div class="py-3 mb-3 bg-gradient-dark border-radius-lg pe-1">
                <div class="chart">
                    <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-4">
            <div>Capital<br/>{{ $statistiqueEcriture["capital"]}}</div>
            <div>Total ecriture<br/>{{ $statistiqueEcriture["totalEcriture"]}}</div>
            <div>Total Entrant<br/>{{ $statistiqueEcriture["totalEntrant"]}}</div>
            <div>Total Sortant<br/>{{ $statistiqueEcriture["totalSortant"]}}</div>
        </div>
    </div>
</div>

@endsection
@push('dashboard')
  <script>

    function ecritureParMois(){

        var response= [];
        var mois= [];
        var somme= [];

        (function($){

            let hostname= window.location.hostname;
            let port= window.location.port;

            $.get("http://"+hostname+":"+port+"/api/ecritures/parmois", function(data){

                data.forEach(function(item){
                    let items= {x: item.mois, y: item.total};
                    mois.push(items.x);
                    somme.push(items.y);
                })
            })

        })(jQuery)

        response.push(mois);
        response.push(somme);

        return response;

    }


    window.onload = function() {

      var ctx = document.getElementById("chart-bars").getContext("2d");

      let donnees= ecritureParMois();

      new Chart(ctx, {
        type: "bar",
        data: {
        labels: donnees[0],
          datasets: [{
            label: "Total journals",
            data: donnees[1],
            tension: 0.4,
            borderRadius: 4,
            backgroundColor: "#fff",
            maxBarThickness: 6
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: true,
            }
          },
          interaction: {
            intersect: true,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });
    }
  </script>
@endpush

