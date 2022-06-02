<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iTeam-$ | Gestion-Budget</title>
    <link rel="stylesheet" href="{{ url(asset("css/app.css")) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: "Cairo";
        }

        h1{
            font-family: "Anton";
        }
    </style>

</head>
<body>

    <div id="root"></div>

    <script src={{ url(asset("js/manifest.js"))}} defer></script>
    <script src={{ url(asset("js/vendor.js"))}} defer></script>
    <script src="{{ url(asset("js/index.js")) }}" defer></script>
    
</body>
</html>
