
     <div class="row">
        <div class="d-flex justify-content-center">
                <div class="journals-liste vue col-6" id="journals">
                    <div class="content">
                        <div class="component component--bordered component--rounded">
                            <div class="component component__layer component__layer--bordered p-1">
                                <a class="carte" href="#!">
                                    <div class="front" style="background-image: url(//source.unsplash.com/300x401)">
                                        <p>journal</p>
                                    </div>
                                    <div class="back">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-info">
                                                details
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">

                    <div class="component component--bordered component--rounded mb-2">
                        <div class="component component__layer component__layer--bordered">
                            <div class="d-block">
                                <h1 slot="header" style="font-weight: 700">Capital</h1>
                                <p slot="content">40000000000877 Ariary</p>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
        <div class="">
            <div class="component component--bordered component--rounded">
                <div class="component__layer component__layer--bordered">
                    <div id="container__chartjs" style="flex: 1;">
                        <canvas id="chartWritings"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="writings-list">
        <section class="mx-5">
            <div class="row">
                <div class="col-6">
                    <h1>Ecritures<br/></h1>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <div class="d-flex d-col">
                        @auth
                            <button id="ajouter" type="button" class="btn btn-info mx-2">
                                <a href="{{ route("writing.form") }}" style="color: white; text-decoration: none;">ajouter</a>
                            </button>
                        @endauth
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                filtre
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" id="writings-list-item" href="#">tout</a>
                                <a class="dropdown-item" id="entrees-list-item" href="#">entrant</a>
                                <a class="dropdown-item" id= "outgoings-list-item" href="#">sortant</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="writings-list">
                @foreach($writings as $entry)
                    <details>
                        <summary>
                            <div>
                                <p>
                                    <strong>{{ $entry->amount }} Ar</strong>
                                    <p>{{ $entry->motif }}</p>
                                </p>
                                <span>details</span>
                            </div>
                        </summary>
                        <div>
                            <div class="row mb-3 justify-content-between">
                                <div class="col-6">
                                    @if($entry->attachment == "NULL")
                                        <div>
                                            <img class="w-100 h-100" src="{{ url(asset("storage/facture.jpg")) }}" alt="sans image">
                                        </div>
                                    @else
                                        avec image
                                        {{ $entry->attachment }}
                                    @endif
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div id="descripttion">
                                        <div class="row justify-content-between">
                                            <div class="col-6">{{ $entry->amount }} Ar</div>
                                            <div class="col-6 text-end">
                                                {{ $entry->updated_at }}</div>
                                        </div>
                                        <div class="my-1"> Motif<br/>{{ $entry->motif }}</div>
                                        <div class="row justify-content-between">
                                            <div class="col-6">@php echo $entry->type ? "entrant": "sortant"; @endphp</div>
                                            <div class="col-6 text-end">{{ $entry->account->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </details>
                @endforeach
                {!! $writings->links() !!}
            </div>

            <div id="entrees-list" class="d-none">
                @foreach($entrees as $entry)
                    <details>
                        <summary>
                            <div>
                                <p>
                                    <strong>{{ $entry->amount }} Ar</strong>
                                    <p>{{ $entry->motif }}</p>
                                </p>
                                <span>details</span>
                            </div>
                        </summary>
                        <div>
                            <div class="row mb-3 justify-content-between">
                                <div class="col-6">
                                    @if($entry->attachment == "NULL")
                                        <div>
                                            <img class="w-100 h-100" src="{{ url(asset("storage/facture.jpg")) }}" alt="sans image">
                                        </div>
                                    @else
                                        avec image
                                        {{ $entry->attachment }}
                                    @endif
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div id="descripttion">
                                        <div class="row justify-content-between">
                                            <div class="col-6">{{ $entry->amount }} Ar</div>
                                            <div class="col-6 text-end">
                                                {{ $entry->updated_at }}</div>
                                        </div>
                                        <div class="my-1"> Motif<br/>{{ $entry->motif }}</div>
                                        <div class="row justify-content-between">
                                            <div class="col-6">@php echo $entry->type ? "entrant": "sortant"; @endphp</div>
                                            <div class="col-6 text-end">{{ $entry->account->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </details>
                @endforeach
                {!! $entrees->links() !!}

            </div>

            <div id="outgoings-list" class="d-none">
                @foreach($outgoings as $entry)
                    <details>
                        <summary>
                            <div>
                                <p>
                                    <strong>{{ $entry->amount }} Ar</strong>
                                    <p>{{ $entry->motif }}</p>
                                </p>
                                <span>details</span>
                            </div>
                        </summary>
                        <div>
                            <div class="row mb-3 justify-content-between">
                                <div class="col-6">
                                    @if($entry->attachment == "NULL")
                                        <div>
                                            <img class="w-100 h-100" src="{{ url(asset("storage/facture.jpg")) }}" alt="sans image">
                                        </div>
                                    @else
                                        avec image
                                        {{ $entry->attachment }}
                                    @endif
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div id="descripttion">
                                        <div class="row justify-content-between">
                                            <div class="col-6">{{ $entry->amount }} Ar</div>
                                            <div class="col-6 text-end">
                                                {{ $entry->updated_at }}</div>
                                        </div>
                                        <div class="my-1"> Motif<br/>{{ $entry->motif }}</div>
                                        <div class="row justify-content-between">
                                            <div class="col-6">@php echo $entry->type ? "entrant": "sortant"; @endphp</div>
                                            <div class="col-6 text-end">{{ $entry->account->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </details>
                @endforeach
                {!! $outgoings->links() !!}
            </div>
        </section>
    </div>

    @auth
        <div class="mt-5 d-flex justify-content-center">
            <div id="edit" style="width: 90vw; height: 90vh; background-color: #dee2e6;"></div>
        </div>
    @endauth


<script>


    function chartJournals(id){
        // chartjs entrée sortie d'un journal en particulier
        (function($) {

            var entrant= [];
            var sortant= [];

            // recuperation de tout les entrées sorties du journal
            $.get("http://localhost:8000/api/writings/?q=distinct&j="+id, function(writings){


                writings.entrant.forEach(writing => {
                    let entry= {x: writing.updated_at, y: writing.amount}
                    entrant.push(entry);

                });

                writings.sortant.forEach(writing => {

                    let outgoing= {x: writing.updated_at, y: writing.amount}
                    sortant.push(outgoing);
                });


                const graphes= document.getElementById('chartWritings');
                let chart= new Chart(graphes, {

                    data: {
                        datasets: [
                            {
                                type: "line",
                                data: entrant,
                                backgroundColor: "#008000",
                                borderColor: "#008000",
                            },
                            {
                                type: "line",
                                data: sortant,
                                backgroundColor: "#FF0000",
                                borderColor: "#FF0000",
                            }
                        ]
                    },
                    options: {}
                });
            });
            // fin statistique en graphe

        })(jQuery)

    }

    (function($){

        $(document).on("click", "#entrees-list-item", function(event){

            event.preventDefault();

            $("#entrees-list").removeClass("d-none");
            $("#writings-list").removeClass("d-block");
            $("#outgoings-list").removeClass("d-block");

            $("#entrees-list").addClass("d-block");
            $("#writings-list").addClass("d-none");
            $("#outgoings-list").addClass("d-none");

            console.log("entrees show");
        })

        $(document).on("click", "#outgoings-list-item", function(event){

            event.preventDefault();

            $("#entrees-list").removeClass("d-block");
            $("#writings-list").removeClass("d-block");
            $("#outgoings-list").removeClass("d-none");

            $("#entrees-list").addClass("d-none");
            $("#writings-list").addClass("d-none");
            $("#outgoings-list").addClass("d-block");
        })

        $(document).on("click", "#writings-list-item", function(event){

            event.preventDefault();

            $("#entrees-list").removeClass("d-block");
            $("#writings-list").removeClass("d-none");
            $("#outgoings-list").removeClass("d-block");

            $("#entrees-list").addClass("d-none");
            $("#writings-list").addClass("d-block");
            $("#outgoings-list").addClass("d-none");
        })

        $("#edit").mouseenter(function(event){

            console.log("show lightbox");
        })

        $("#edit").mouseleave(function(event){

            console.log("hide lightbox");
        })


        $(document).on("click", "#ajouter", )



    })(jQuery)

</script>


