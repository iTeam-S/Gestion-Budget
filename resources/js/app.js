require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

window.uri = "login";

document.addEventListener("DOMContentLoaded", function(event) {

    /* soit disant oe misy variable globale qui va contenir le soit disant lien de requete
    vu que c'est une application à page unique, l'uri ne va pas change alors on va essayer
    de creer une sorte de système d'uri dans le coté javascript */

    switch(window.uri){



        case "dashboard":
            get_stat();

        default:
            // login

    }

});


