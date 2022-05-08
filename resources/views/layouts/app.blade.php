
<!DOCTYPE html>


<html lang="fr" >

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 {{--
    je laisse la d'abord? a etudier
  @if (env('IS_DEMO'))
      <x-demo-metas></x-demo-metas>
  @endif --}}

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/stable/favicon.png">
  {{-- a renommer favicon.png le logo iteams.png--}}
  <link rel="icon" type="image/png" href="../assets/img/stable/favicon.png">
  <title>
      iTeam-$ | Gestion-Budget - Login
  </title>
  <!--     Fonts and icons     -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Neonderthaw&display=swap" rel="stylesheet">  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files a renommer ty aveo fa tsy poins-->

  <link href="{{ asset("css/app.css") }}" rel="stylesheet" />
</head>

<body>
  @auth
    @yield('auth')
  @endauth
  @guest
    @yield('guest')
  @endguest
    <!--   Core JS Files   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/fullcalendar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>


  @stack('dashboard')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>


      <script>

function validerEcriture(ecriture){


    // renvoyer requete ajax post pour valider enregistrer l'écriture et envoyé la notification
    // chez la personne qui a indexé la notification

    (function($){

        var hostname= window.location.hostname;
        var port= window.location.port;

        url= "http://"+hostname+":"+port+"/ecritures/valider";

        $.ajax({
            url: url,
            method: "POST",
            beforeSend: function(){
                $('.loader').removeClass('hidden')
            },
            data:{
                "_token": "{{ csrf_token() }}",
                ecriture: ecriture
            }
        })
        .done(function(){
        })
        .always(function () {

            $('.loader').addClass('hidden')

        })
    })(jQuery)

}

function annulerEcriture(ecriture){

    console.log(ecriture);
}

</script>

  @yield("script")
</body>

</html>
