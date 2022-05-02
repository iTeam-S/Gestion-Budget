@extends('layouts.app')

@section("head")
    @include("includes.head")
@endsection

@section("navbar")
    @include("includes.navbar")
@endsection

@section('content')

    {{--
    <div style="height: 255px; width: 255px">
        <img src="{{ url(asset("storage/logo.png")) }}" alt="logo" style="width: 100%; height: 100%" />
    </div> --}}

    <div class="p-5 m-5">
        <div class="search--wrap">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="rechercher journals">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>

        <div class="d-flex justify-content-center my-5">
            <nav>
                <a href="#journals">Journals</a>
                <a href="#statistique">Statistique</a>
            </nav>
        </div>
    </div>


     <div class="vue pb-5 my-5">
        <h1 class="title">Ecritures récents</h1>
        <div id="app" class="container d-flex justify-content-around">
            @foreach($ecritureRecents as $ecriture)
            <card data-image="https://images.unsplash.com/photo-1479660656269-197ebb83b540?dpr=2&auto=compress,format&fit=crop&w=1199&h=798&q=80&cs=tinysrgb&crop=">
                <h1 slot="header">{{ $ecriture->journal }}
                    <span style="font-size: 14px">{{ $ecriture->updated_at }}</span>
                </h1>
                <div slot="content" class="text-ellipsis">
                    <p>Motif<br/>
                    {{ $ecriture->motif }}
                    </p>
                    <p>Compte: {{ $ecriture->account }}</p>
                </div>
            </card>
            @endforeach
        </div>
    </div>


    <div class="container my-5" id="statistique">
        <div class="row">
            <div class="col-4">
                <div class="component component--bordered component--rounded mb-2">
                    <div class="component component__layer component__layer--bordered">
                        <div class="d-block">
                            <h1 slot="header" style="font-weight: 700">Capital</h1>
                            <p slot="content">{{ number_format($capital, 2, ",", " ") }} Ariary</p>
                        </div>
                    </div>
                </div>
                <div class="component component--bordered component--rounded">
                    <div class="component component__layer component__layer--bordered">
                        <div class="d-block">
                            <p>
                                <span style="font-weight:501">Total journals</span>:
                                {{ $totalJournal }}
                            </p>
                            <p>
                                <span style="font-weight:501">Total écritures</span>:
                                {{ $totalEcriture }}
                            </p>
                            <p>
                                <span style="font-weight:501">Total entrant</span>:
                                {{ number_format($totalEntrant, 2, ",", " ") }} Ariary
                            </p>
                            <p>
                                <span style="font-weight:501">Total sortant</span>:
                                {{ number_format($totalSortant, 2, ",", " ") }} Ariary
                            </p>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-8">
                <div class="component component--bordered component--rounded">
                    <div class="component__layer component__layer--bordered">
                        <div id="container__chartjs" style="flex: 1;">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="journals-liste vue my-5" id="journals">
            <h1 class="title">Journals</h1>
            <div class="content">
                @foreach($journalsActif as $journal)
                    <div class="component component--bordered component--rounded m-2">
                        <div class="component component__layer component__layer--bordered p-1">
                            <a class="carte" href="#!">
                                <div class="front" style="background-image: url(//source.unsplash.com/300x401)">
                                    <p>{{ $journal->name }}</p>
                                </div>
                                <div class="back">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn btn-info" onclick="redirect({{ $journal->id }})">
                                            details
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-5">
                <button type="button" class="btn btn-info">
                    <a href="#" style="color:white; text-decoration: none;">voir les journals</a></button>
            </div>
        </div>
    </div>

    <div class="notification">
        <div>Notification {{ Auth::user()->unreadNotifications->count() }}</div>
        @foreach(Auth::user()->unreadNotifications as $notification)

            <div>{{ $notification }}</div>
        @endforeach
    </div>



@endsection

@section("script")
<script>
    (function($) {

        var data= [];

        // recuperation de tout les journals
        $.get("http://localhost:8000/api/journals", function(journals){



            journals.forEach(journal => {

                let element= {x: journal.name, y: journal.total}
                data.push(element);
            });

            const graphe= document.getElementById('myChart');
                // not definded const Chart = require('chart.js');
            const myChart = new Chart(graphe, {

                data: {
                    datasets: [{
                        type: "bar",
                        label: "total journals",
                        data: data,
                        backgroundColor: "#008080",
                        borderColor: "#008080",
                        fill: false,
                        barPercentage: 0.2,
                        }],
                },
                options: {
                    scales: {
                        x: {
                            grid: {
                            display: false
                            }
                        },
                        y: {
                            grid: {
                            display: false
                            }
                        }
                    }
                },
            });

        });
        // fin statistique en graphe

    })(jQuery)

</script>
@endsection






