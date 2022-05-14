@extends('layouts.user_type.auth')

@section('content')

    <div id="list-ecritures" class="grid grid-cols-4"></div>

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


    document.addEventListener("DOMContentLoaded", function(event) {

        get_ecritures();

        /*
        create_account= document.getElementById("create-account");

        create_account.addEventListener("submit", (event)=> {

            if(!event.preventDefault()) {

                const nom_compte= event.target.nom_compte.value.toString().trim();
                const description_compte= event.target.description_compte.value.toString().trim();
                const code_compte= event.target.code_compte.value;

                store_account(nom_compte, description_compte, code_compte);
                // annule la submittion

                return false;
            }
        })*/

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
