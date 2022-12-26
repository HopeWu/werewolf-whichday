<!DOCTYPE html>
<html lang="en">
<head>
    <title>Werewolf</title>
    <meta charset="UTF-8">
    <meta name="description"
          content="Tool for playing Werewolf face to face.">
    <link href="{{ asset('css/custom.css')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">

    <link rel="apple-touch-icon" sizes="120x120"
          href="https://www.relationsutveckling.se/images/favicon_package_v0/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="152x152"
          href="https://www.relationsutveckling.se/images/favicon_package_v0/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
          href="https://www.relationsutveckling.se/images/favicon_package_v0/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="https://www.relationsutveckling.se/images/favicon_package_v0/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="https://www.relationsutveckling.se/images/favicon_package_v0/favicon-16x16.png">
    <link rel="manifest" href="https://www.relationsutveckling.se/images/favicon_package_v0/site.webmanifest">
    <link rel="mask-icon" href="https://www.relationsutveckling.se/images/favicon_package_v0/safari-pinned-tab.svg"
          color="#5bbad5">
    <link rel="shortcut icon" type="image/x-icon"
          href="https://www.relationsutveckling.se/images/favicon_package_v0/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config"
          content="https://www.relationsutveckling.se/images/favicon_package_v0/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
{{$slot}}
<footer>

</footer>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script type="text/javascript"
        src="{{asset('js/ru.js')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}">
</script>


<script type="text/javascript"
        src="{{asset('js/custom.js')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"></script>
</body>
</html>
