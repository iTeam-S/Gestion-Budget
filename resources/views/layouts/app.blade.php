@yield("head")

<body>
    @yield("navbar")

    <div id="app">
        @yield('content')
    </div>

    <script>
        /**
        *
        * @param {*} id
        */
        function showDetailsJournals(id){
            var domainName= window.location.hostname;
            var port= window.location.port;

            $.get("http://"+domainName+":"+port+"/writings/?j="+id, function(data){

                $("#ligthbox--container").html("");
                $("#journals--writings").html(data);
            })
        }

        function chartJournals(id= null){

        console.log(id);
        // chartjs entrée sortie d'un journal en particulier
        (function($) {

            var entrant= [];
            var sortant= [];
            var url = "";

            url= id != null ? "http://localhost:8000/api/writings/?q=distinct&j="+id: "http://localhost:8000/api/writings/?q=distinct"

            // recuperation de tout les entrées sorties du journal
            $.get(url , function(writings){


                writings.entrant.forEach(writing => {
                    let entry= {x: writing.updated_at, y: writing.amount}
                    entrant.push(entry);

                });

                writings.sortant.forEach(writing => {

                    let outgoing= {x: writing.updated_at, y: writing.amount}
                    sortant.push(outgoing);
                });

                console.log(entrant)
                console.log(sortant)



                const graphes= document.getElementById('chartWritings');
                let chart= new Chart(graphes, {

                    data: {
                        datasets: [
                            {
                                type: "line",
                                label: "les entrées",
                                data: entrant,
                                backgroundColor: "#008000",
                                borderColor: "#008000",
                            },
                            {
                                type: "line",
                                label: "les sorties",
                                data: sortant,
                                backgroundColor: "#FF0000",
                                borderColor: "#FF0000",
                            }
                        ]
                    },
                    options: {
                        animations: {
                            tension: {
                                duration: 1000,
                                easing: 'linear',
                                from: 1,
                                to: 0,
                                loop: true
                            }
                        }
                    }
                });
            });
            // fin statistique en graphe

        })(jQuery)

    }

        function redirect(journal_id){
        // redirection vers un journals en particulier
            $.get("http://localhost:8000/journal/?id="+journal_id, function(page){

                chartJournals(journal_id);
                $("#app").html(page);
            });


        }
    </script>

    @yield("script")
</body>
</html>
