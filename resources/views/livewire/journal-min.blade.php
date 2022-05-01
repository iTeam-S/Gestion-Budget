
    <div class="row justify-content-around">
        <div class="journal col-lg-5 border  h-100 m-3">
            <div class="d-flex justify-content-between align-items-center m-2">
                <div class="journal__title">ENTRANT</div>
                <button type="button" class="journal__button btn btn-outline-success">ajouter</button>
            </div>
            <div class="journal__writings">
                <div class="d-flex justify-content-center">
                    <div class="writings">
                        @forelse ($entrees as $entry)
                            <div class="d-flex justify-content-between journal__writing my-2">
                                <div id={{ $entry->id }} class="entry d-flex writing">
                                    <div class="left-side p-2">
                                        <div class="img">
                                            <img src="{{ url(asset("storage/writing.png")) }}" alt="writing" />
                                        </div>
                                    </div>

                                    <div class="right-side">
                                        <div class='amount text-end'>
                                            <span style="border-bottom: 1px solid #dee2e6">{{ $entry->amount }} Ariary</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="motif" style="max-width: 60%;">{{ $entry->motif }}</div>
                                            <div class="text-end">{{ $entry->account->name }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="journal__edition d-flex align-items-center">
                                    <button type="button" id="detail-{{$entry->id }}" onclick="detailsEcriture({{$entry->id}})" class="journal__button btn btn-outline-success mx-1">details</button>
                                </div>
                            </div>
                        @empty
                            <div>vide</div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="pt-2 d-flex justify-content-end">
                {!! $entrees->links()!!}
            </div>
        </div>
        <div class="journal col-lg-5 border  h-100 m-3">
            <div class="d-flex justify-content-between align-items-center m-2">
                <div class="journal__title">SORTANT</div>
                <button type="button" class="journal__button btn btn-outline-success">ajouter</button>
            </div>
            <div class="journal__writings">
                <div class="d-flex justify-content-center">
                    <div class="writings writings--r">
                        @forelse ($outgoings as $entry)
                            <div class="d-flex justify-content-between journal__writing my-2">
                                <div id={{ $entry->id }} class="entry d-flex writing">
                                    <div class="left-side p-2">
                                        <div class="img">
                                            <img src="{{ url(asset("storage/writing.png")) }}" alt="writing" />
                                        </div>
                                    </div>

                                    <div class="right-side">
                                        <div class='amount text-end'>
                                            <span style="border-bottom: 1px solid #dee2e6">{{ $entry->amount }} Ariary</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="motif" style="max-width: 60%;">{{ $entry->motif }}</div>
                                            <div class="text-end">{{ $entry->account->name }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="journal__edition d-flex align-items-center">
                                    <button type="button" id="detail-{{$entry->id }}" onclick="detailsEcriture({{$entry->id}})" class="journal__button btn btn-outline-success mx-1">details</button>
                                </div>
                            </div>
                        @empty
                            <div>vide</div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="pt-2 d-flex justify-content-end">
                {!! $outgoings->links()!!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6 d-flex justify-content-center">
            <div class="row">
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
                                <p slot="content">4844444444 Ariary</p>
                            </div>
                        </div>
                    </div>
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
        </div>
        <div class="col-6">
            <div class="component component--bordered component--rounded">
                <div class="component__layer component__layer--bordered">
                    <div id="container__chartjs" style="flex: 1;">
                        <canvas id="chartWritings"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>

    $(document).ready(function(){


        $(document).on("click", "#detail-8", function(){

            // avoir la page details
            $.get("http://localhost:8000/journal/detail/8", function(data){

                $(".writings.writings--r").html(data);
                window.history.pushState({}, '' , "/journal/detail/8")

            })
        })
    });

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

</script>


