/**
 * verifie la syntaxe valide d'un mail
 * @param {String} email
 * @returns {Boolean}
 */
function checkEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


/**
 * equivalent a htmlspecialchars en php
 * faire echapper les valises dans une chaine
 * @param {String} text
 * @returns {String}
 */
function escapeHtml(text){
    var map = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
  }

/**
 * se charge de l'authentification de l'utilisateur
 * @param {String} user
 * @param {String} passwd
 * @returns {Boolean}
 */
function login(user, passwd){

    var auth= "";
    user= user.toString();

    if(checkEmail(user)){

        console.log("email")
        console.log(checkEmail(user))
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:window.location.href+"login",
            data: {"email": user, "password": passwd.toString()},
            type:'post',
            success: function(result){

                console.log(result)
                window.history.pushState({}, "", "/home");
            }
        });
    }
    else{
        // si ce n'est pas un email, surement ce serait l'username
        // verifier s'il/elle fait partie de la communauté
        var username = escapeHtml(user).trim();

        $.get("https://api.iteam-s.mg/api/membre/get/"+username, function(data){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:window.location.href+"login",
                data: {"email": data.mail, "password": passwd.toString()},
                type:'post',
                success: function(result){

                    console.log(result)
                    window.history.pushState({}, "", "/home");
                }
            });
        });
    }

}

/**
 *
 * @param {*} id
 */
function showDetailsJournals(id){
    var domainName= window.location.hostname;
    var port= window.location.port;

    $.get("http://"+domainName+":"+port+"/writings/?j="+id, function(data){

        console.log(data);
    })
}

export { login, showDetailsJournals }
