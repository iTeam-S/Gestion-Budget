require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

window.isMember= function(username){

}

window.login= function(event) {
    event.preventDefault();

    username= document.getElementById("username").val();

    console.log(window.isMember(username));

    // annuler la submittion
    return false;
}







