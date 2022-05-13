
<!DOCTYPE html>
<html lang="fr" >

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/stable/favicon.png">
    <link rel="icon" type="image/png" href="../assets/img/stable/favicon.png">
    <title>iTeam-$ | Gestion-Budget - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Neonderthaw&display=swap" rel="stylesheet">  <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="{{ asset("css/app.css") }}" rel="stylesheet" />
</head>

<body>
    @auth
        @yield('auth')
    @endauth
    @guest
        @yield('guest')
    @endguest

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/fullcalendar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    @stack('dashboard')
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }


    function switch_to(uri){

        let promise= null;
        const url= "http://localhost:8000/"+uri;
        const token= sessionStorage.getItem("_token");

        const init= {
            method: "GET",
            headers: {
                "Content-type": "application/x-www-form-urlencoded",
                "Authorization": "Bearer "+token
            }
        }

        promise= fetch(url, init).then(function(promise){ return promise.text()});

        promise.then(function(page){

            window.history.pushState({},"", "http://localhost:8000/comptes/?token="+token);
            document.body.innerHTML= page;
        })
        .catch(function(error){

            console.log(error);
        });
    }

</script>

  @yield("script")
</body>

</html>
