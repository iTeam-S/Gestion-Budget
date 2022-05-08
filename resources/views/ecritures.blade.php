@extends('layouts.user_type.auth')

@section('content')

<h1>Dernière écriture</h1>
    <div class="grid grid-cols-4">
        {{-- foreach last ecriture --}}
        @forelse($ecritureRecents as $ecriture)
            <div>
                    <h3>journal: {{ $ecriture->journal }}</h3>
                    <div>date: {{ $ecriture->updated_at }}</div>
                    <p>motif: {{ $ecriture->motif }}</p>
                    <div>somme: {{ $ecriture->somme }}</div>
                    <div>compte: {{ $ecriture->account }}</div>
            </div>
        @empty
            <div>Vide</div>
        @endforelse
        {{-- fin dernier écriture--}}
    </div>
    <div class="grid grid-cols-2 mx-4">
        <div>
            @forelse($ecritures as $ecriture)
                @include("components.kanban", ["ecriture"=> $ecriture])
            @empty
                <div>vide</div>
            @endforelse
        </div>
    </div>


        <div id="formulaire" class="flex items-center justify-center" style=" height: 600px; width: 800px; background: #dee2e6">
            @include("components.formulaire.ecriture",  ["journals"=> $journals, "accounts"=> $accounts])
        </div>





@endsection

@section("script")
<script>
    $(document).ready(function() {
        $("#formulaire").mouseenter(function(event){

            createEcriture= $("#lightbox-create").css("display");
            if(createEcriture == "none"){
                $("#lightbox").removeClass("d-none");
                $("#lightbox").addClass("d-block");
            }
        })

        $("#formulaire").mouseleave(function(event){

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
    });

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
        if(dropZoneElement.querySelector(".drop-zone__prompt")) {
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
@endsection
