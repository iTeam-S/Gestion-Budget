<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url(asset("css/app.css")) }}">
</head>
<body>

    <div id="root"></div>


    <script src={{ url(asset("js/manifest.js"))}} defer></script>
    <script src={{ url(asset("js/vendor.js"))}} defer></script>
    <script src="{{ url(asset("js/app.js")) }}" defer></script>
</body>
</html>
