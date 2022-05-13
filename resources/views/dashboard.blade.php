@extends('layouts.user_type.auth')

@section('content')
<div class="mt-4">
    <div class="mb-4">
        <div>
            <div class="py-3 mb-3 bg-gradient-dark border-radius-lg pe-1">
                <div class="chart">
                    <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-4">
            <div class="p-1">
                <div class="carte carte--statistique">
                    <h3>Capital</h3>
                    <div id="capital"></div>
                </div>
            </div>

            <div class="p-1">
                <div class="carte carte--statistique">
                    <h3>Nombre ecritures</h3>
                    <div id="nombre_ecriture"></div>
                </div>
            </div>
            <div class="p-1">
                <div class="carte carte--statistique">
                    <h3>Nombre journals</h3>
                    <div id="nombre_journal"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('dashboard')
  <script>

/*
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

    }*/



    function get_stat(){

        let promise= null;
        const url= "http://localhost:8000/api/dashboard";
        const token= sessionStorage.getItem("_token");

        const init= {
            method: "GET",
            headers: {
                "Content-type": "application/x-www-form-urlencoded",
                "Authorization": "Bearer "+token
            }
        }

        promise= fetch(url, init).then(function(promise){ return promise.json()});

        promise.then(function(statistique){

            document.getElementById("capital").innerHTML= statistique.capital;
            document.getElementById("nombre_ecriture").innerHTML= statistique.nombre_ecriture;
            document.getElementById("nombre_journal").innerHTML= statistique.nombre_journal;
        })
        .catch(function(error){

            console.log(error);
        });

    }

    document.addEventListener("DOMContentLoaded", function(event) {

        get_stat();

    });


/*

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


    }*/
  </script>
@endpush

