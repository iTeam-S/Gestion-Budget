@extends('layouts.user_type.auth')

@section("content")
    <div>
        Description<br/>
        <div>Nom: {{ $journal->name }}</div>
        <div>Total: {{ $journal->total }}</div>
    </div>

    <div style="height: 500px; width: 100%">
        <canvas id="chart-journals"></canvas>

    </div>

    <div>
        @forelse($ecritureJournals as $ecriture)
            @include("components.kanban", ["ecriture"=> $ecriture])
        @empty
            <div>Vide</div>
        @endforelse
    </div>
@endsection


@section("script")

<script>



    function ecritureParMoisDistinct(){

        var response=[]
        var responseEntrant= [];
        var responseSortant= [];
        var moisEntrant= [];
        var sommeEntrant= [];
        var moisSortant= [];
        var sommeSortant= [];

        (function($){

            let hostname= window.location.hostname;
            let port= window.location.port;

            $.get("http://"+hostname+":"+port+"/api/ecritures/parmois/?q=distinct&j="+{{ $journal->id }}, function(data){

                data.entrants.forEach(function(item){
                    let items= {x: item.mois, y: item.total};
                    moisEntrant.push(items.x);
                    sommeEntrant.push(items.y);
                })

                data.sortants.forEach(function(item){
                    let items= {x: item.mois, y: item.total};
                    moisSortant.push(items.x);
                    sommeSortant.push(items.y);
                })
            })

        })(jQuery)

        responseEntrant.push(moisEntrant);
        responseEntrant.push(sommeEntrant);
        responseSortant.push(moisSortant);
        responseSortant.push(sommeSortant);

        response.push(responseEntrant);
        response.push(responseSortant);

        return response;

    }



window.onload= function(){

    var donnees= ecritureParMoisDistinct();
    console.log(donnees);
    var ctx2 = document.getElementById("chart-journals").getContext("2d");

var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

new Chart(ctx2, {
  type: "bar",
  data: {
    labels: donnees[0][0],
    datasets: [{
        label: "Entrants",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#cb0c9f",
        borderWidth: 3,
        backgroundColor: gradientStroke1,
        fill: true,
        data: donnees[0][1],
        maxBarThickness: 6

      },
      {
        label: "Sortants",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#3A416F",
        borderWidth: 3,
        backgroundColor: gradientStroke2,
        fill: true,
        data: donnees[1][1],
        maxBarThickness: 6
      },
    ],
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
// fin statistique en graphe

</script>
@endsection
