
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
            <div id="edit" class="position-relative" style="width: 90vw; height: 90vh; background-color: #dee2e6;">
                <div id="lightbox" class="d-none">
                    <div class="h-100 d-flex align-items-center justify-content-center">
                        <button id="create" class="btn btn-primary btn-block btn-large">creer une écriture</button>
                    </div>
                </div>
                <div class="container d-none" id="lightbox-create">
                    <h1 style="font-weight: 700 !important; border-bottom: 1px solid #008080;">Créer une écriture</h1>
                    <form id="form-entrant" method="post" action="{{ route("writing.create") }}" class="m-3" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="journal" value={{ $id }}>
                        <div class="row">
                            <div class="col-3">
                                <input type="text" name="amount" id="user" placeholder="montant en ariary" required="required" />
                            </div>
                            <div class="col-3">
                                <input type="date" id="date" name="date" />
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">compte</label>
                                    </div>
                                    <select class="custom-select" name="account" id="account">
                                        <option selected>Choisir ...</option>
                                        @foreach($accounts as $account)
                                            <option value="{{$account->id }}">{{ $account->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">type</label>
                                    </div>
                                    <select class="custom-select" name="type" id="type">
                                        <option selected>Choisir ...</option>
                                        <option value="1">entrant</option>
                                        <option value="0">sortant</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="my-2">
                            <textarea name="motif" class="w-100" rows="10" id="motif" placeholder="motif"></textarea>
                        </div>

                        <div class="d-flex justify-content-center align-items-center">
                            <div class="drop-zone w-100">
                                <span class="drop-zone__prompt">Déposez le fichier ici ou cliquez pour télécharger</span>
                                <input type="file" name="attachment" class="drop-zone__input">
                            </div>
                        </div>


                        <div class="d-flex justify-content-center m-3">
                                <button type="submit" class="btn btn-primary btn-block btn-large">valider</button>
                        </div>
                    </form>
                </div>
            </div>
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

            createEcriture= $("#lightbox-create").css("display");


            if(createEcriture == "none"){
                $("#lightbox").removeClass("d-none");
                $("#lightbox").addClass("d-block");
            }
        })

        $("#edit").mouseleave(function(event){

            if(createEcriture == "none"){
                $("#lightbox").addClass("d-none");
                $("#lightbox").removeClass("d-block");
            }
        })


        $(document).on("click", "#create", function(event){

            $("#lightbox").addClass("d-none");
            $("#lightbox-create").removeClass("d-none");
            $("#lightbox-create").addClass("d-block");



        });



    })(jQuery)

    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");

    dropZoneElement.addEventListener("click", (e) => {
      inputElement.click();
    });

    inputElement.addEventListener("change", (e) => {
      if (inputElement.files.length) {
        updateThumbnail(dropZoneElement, inputElement.files[0]);
      }
    });

    dropZoneElement.addEventListener("dragover", (e) => {
      e.preventDefault();
      dropZoneElement.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
      dropZoneElement.addEventListener(type, (e) => {
        dropZoneElement.classList.remove("drop-zone--over");
      });
    });

    dropZoneElement.addEventListener("drop", (e) => {
      e.preventDefault();

      if (e.dataTransfer.files.length) {
        inputElement.files = e.dataTransfer.files;
        updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
      }

      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  /**
   * Updates the thumbnail on a drop zone element.
   *
   * @param {HTMLElement} dropZoneElement
   * @param {File} file
   */
  function updateThumbnail(dropZoneElement, file) {
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

    // First time - remove the prompt
    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
      dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }

    // First time - there is no thumbnail element, so lets create it
    if (!thumbnailElement) {
      thumbnailElement = document.createElement("div");
      thumbnailElement.classList.add("drop-zone__thumb");
      dropZoneElement.appendChild(thumbnailElement);
    }

    thumbnailElement.dataset.label = file.name;

    // Show thumbnail for image files
    if (file.type.startsWith("image/")) {
      const reader = new FileReader();

      reader.readAsDataURL(file);
      reader.onload = () => {
        thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
      };
    } else {
      thumbnailElement.style.backgroundImage = null;
    }
  }


</script>


