require('./bootstrap');

// importation framework bootstrap
import "bootstrap";
import $ from 'jquery';
import { drop } from "lodash";

window.$ = window.jQuery = $;

$(function() {
    openLoginModal();



    //Login Functionality
    $('#form').on(click, function(e) {
        e.preventDefault();
        var email = $('#user').val();
        var password = $('#password').val();
        var token = $('input[name="_token"').val();

        $.ajax({
            url: '{{route("login")}}',
            type: "post",
            data: {
                '_token': token,
                'email': email,
                'password': password
            },
            success: function(res) {
                console.log(res)
                if (res.error) {
                    $('#loginerror').text(res.error)
                }
                if (res.success) {
                    window.location.href = '/home';
                }
            }
        })
    })
});
