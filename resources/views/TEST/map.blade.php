<html>
<head>
    <meta http-equiv='X-UA-Compatible' content='IE=Edge'/>
    <meta charset='UTF-8'>
    <title>Maps SDK for Web - Custom markers</title>
    <meta name='viewport'
          content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'/>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.6.0/maps/maps.css'>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">

</head>
<body>

    {{-- Input to receive accomodation infos to show --}}
    <input id="latitude" type="hidden" value="{{$accomodation[0]->latitude}}">
    <input id="longitude" type="hidden" value="{{$accomodation[0]->longitude}}">
    <input id="accomodation_id" type="hidden" value="{{$accomodation[0]->id}}">
    <input id="title" type="hidden" value="{{$accomodation[0]->title}}">


    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Test TOM TOM Map</h2>
                <div class="map_wrapper">
                    <div id='map' class='map'></div>
                </div>
            </div>
        </div>
    </div>

    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.6.0/maps/maps-web.min.js'></script>
    <script type='text/javascript' src='../js/map.js'></script>
    {{-- <script type='text/javascript' src='../js/mobile-or-tablet.js'></script> --}}

</body>
</html>