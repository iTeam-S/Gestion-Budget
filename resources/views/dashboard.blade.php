@extends('layouts.user_type.auth')

@section('content')
<div class="mt-4 relative">
    <div class="mb-4">
        <div>
        <a class="" style="color:#008080; font-size:25px; font-weight:bolder;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                    </svg>
                    <span class="nav-link-text ms-1">Tableau de bord</span>
                </a> <br> <br>
      
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


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6

            },
            {
              label: "Websites",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
              maxBarThickness: 6
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#b2b9bf',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#b2b9bf',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    }
  </script>
@endpush


