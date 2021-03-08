{{-- UI SHOW --}}
@extends('UI.layouts.app')
@section('title')
    boolBnB
@endsection

{{-- LINK HEAD --}}
@section('link')
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.6.0/maps/maps.css'>
@endsection


@section('main_content')
    {{-- Input to receive accomodation infos to show --}}
    <input id="latitude" type="hidden" value="{{$accomodation->latitude}}">
    <input id="longitude" type="hidden" value="{{$accomodation->longitude}}">
    <input id="id" type="hidden" value="{{$accomodation->id}}">
    <input id="title" type="hidden" value="{{$accomodation->title}}">

{{-- SHOW section  --}}
<section class="show">
    <div id="toast_msg" class="toast_message d-flex align-items-center">
        <img class="toast_img" src="{{asset('storage/map_image/map_icon_boolbnb.png')}}" alt="">
        <div class="wrap_toast_text">
            <h6 id="toast_title" class="toast_title">Messaggio...</h6>
            <p id="toast_text" class="toast_text">Text....</p>
        </div>
    </div>
    {{-- BOOTSTRAP CONTAINER --}}
    <div class="container">
        {{-- BOOTSTRAP ROW --}}
        <div class="row">
            {{-- TITOLO SEZIONE --}}
            <div class="col-12">
                <h2 class="title text-center">{{$accomodation->title}}</h2>
                <span id="btn_contact_host" class=" btn_std text-center"><i class='fas fa-angle-double-down'></i><span> CONTATTA L'HOST</span></span>
                <div id="sec_contact" class="contact">
                    <div id="inputs" class="wrap_inputs">
                        {{-- Accomodation Id --}}
                        <input id="accomodation_id" name="accomodation_id" type="hidden" value="{{$accomodation->id}}">
                        <div class="row">
                            {{-- LEFT COLUMN --}}
                            <div class="col-md-6 col-12">
                                {{-- Message text --}}
                                <span id="text_message_label" class="label"></span>
                                <textarea class="form_input" name="text_message" id="text_message" maxlength="500" placeholder="Cosa vuoi chiedere all'Host? (max: 500 caratteri)" ></textarea>
                            </div>
                            {{-- RIGHT COLUMN --}}
                            <div class="col-md-6 col-12">
                                {{-- Email --}}
                                <span id="email_label" class="label"></span>
                                <input class="form_input" autocomplete="off" type="text" name="email" id="email" maxlength="100" placeholder="Inserisci la tua email">
                                {{-- Nickname --}}
                                <span id="nickname_label" class="label"></span>
                                <input class="form_input" autocomplete="off" type="text" name="nickname" id="nickname" maxlength="50" placeholder="Inserisci nome o nickname" >
                                <div class="wrap_btn_send">
                                    {{-- Send button --}}
                                    <span id="btn_send" class="btn_std"><i class="far fa-paper-plane"></i>INVIA MESSAGGIO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- /BOOTSTRAP ROW --}}
        </div>
        {{-- WRAPPER topviews --}}
        <div class="wrap_topviews">
            {{-- BOOTSTRAP ROW --}}
            <div class="row">
                {{-- LEFT COLUMN --}}
                <div class="col-12 col-lg-6">
                    {{-- COVER IMAGE --}}
                    <img class="img_topviews" src="{{$accomodation->cover_image}}" alt="">
                    <div class="gallery_topviews">
                        <img class="thumbnail" src="{{$accomodation->cover_image}}" data-url="{{$accomodation->cover_image}}" alt="immagine alloggio principale">    
                        @foreach ($accomodation->accomodation_images as $acc_image)
                        {{-- @if ($acc_image->principal) --}}
                            <img class="thumbnail" src="{{$acc_image->image}}" data-url="{{$acc_image->image}}" alt="immagine alloggio di dettaglio">    
                        {{-- @endif --}}
                        @endforeach
                    </div>
                {{-- /LEFT COLUMN --}}
                </div>
                
                {{-- RIGHT COLUMN --}}
                <div class="col-12 col-lg-6">
                    {{-- TITOLO --}}
                    <h6 class="acc_type">TIPO ALLOGGIO: <span class="acc_type_val">{{$accomodation->accomodation_type->name}}</span> </h6>
                    {{-- <p class="acc_description">{{ \Illuminate\Support\Str::words($accomodation->description, 30, " [...] ") }}</p> --}}
                    <p class="acc_description">{{$accomodation->description}}</p>
                    {{-- <h6 class="acc_vedi_link"><a href="{{route("show", $accomodation->slug)}}">> VEDI ANNUNCIO COMPLETO</a></h6> --}}
                    <div class="row">
                        {{-- COLONNA SX INFO --}}
                        <div class="col-12 col-sm-6">
                            <div class="row">
                                {{-- titolo colonna info --}}
                                <div class="col-12">
                                    <h6 class="info_title">INFO:</h6>
                                </div>
                                {{-- metri quadrati --}}
                                <div class="col-6 col-sm-12">
                                    <p class="wrap_service"><i class="service_ico fas fa-ruler-combined"></i> mq: {{$accomodation->square_meters}}</p>
                                </div>
                                {{-- stanze --}}
                                <div class="col-6 col-sm-12">
                                    <p class="wrap_service"><i class="service_ico fas fa-warehouse"></i> stanze: {{$accomodation->rooms}}</p>
                                </div>
                                {{-- letti --}}
                                <div class="col-6 col-sm-12">
                                    <p class="wrap_service"><i class="service_ico fas fa-bed"></i> letti: {{$accomodation->beds}}</p>
                                </div>
                                {{-- toilets --}}
                                <div class="col-6 col-sm-12">
                                    <p class="wrap_service"><i class="service_ico fas fa-toilet"></i> bagni: {{$accomodation->toilets}}</p>
                                </div>
                                {{-- costo --}}
                                <div class="col-6 col-sm-12">
                                    <p class="wrap_service"><i class="service_ico fas fa-money-bill-wave"></i> € {{$accomodation->price}}</p>
                                </div>

                            </div>
                        </div>

                        {{-- COLONNA DX SERVICES EXTRA --}}
                        <div class="col-12 col-sm-6">
                            {{-- titolo colonna SERVIXI --}}
                            <h6 class="info_title">SERVIZI:</h6>
                            {{-- ciclo per stampare i servizi --}}
                            <div class="row">
                                @foreach ($accomodation->services as $service)
                                    @switch($service->id)
                                        @case(1)
                                            {{-- wi-fi --}}
                                            <div class="col-6 col-sm-12">
                                                <p class="wrap_service"><i class="service_ico fas fa-wifi"></i>  {{$service->service_name}}</p>
                                            </div>
                                            @break
                                        @case(2)
                                            {{-- parcheggio --}}
                                            <div class="col-6 col-sm-12">
                                                <p class="wrap_service"><i class="service_ico fas fa-parking"></i>  {{$service->service_name}}</p>
                                            </div>
                                            @break
                                        @case(3)
                                            {{-- piscina --}}
                                            <div class="col-6 col-sm-12">
                                                <p class="wrap_service"><i class="service_ico fas fa-swimming-pool"></i> {{$service->service_name}}</p>
                                            </div>
                                            @break
                                        @case(4)
                                            {{-- reception --}}
                                            <div class="col-6 col-sm-12">
                                                <p class="wrap_service"><i class="service_ico fas fa-concierge-bell"></i> {{$service->service_name}}</p>
                                            </div>
                                            @break
                                        @case(5)
                                            {{-- sauna --}}
                                            <div class="col-6 col-sm-12">
                                                <p class="wrap_service"><i class="service_ico fas fa-hot-tub"></i> {{$service->service_name}}</p>
                                            </div>
                                            @break
                                        @case(6)
                                            {{-- vista mare --}}
                                            <div class="col-6 col-sm-12">
                                                <p class="wrap_service"><i class="service_ico fas fa-umbrella-beach"></i> {{$service->service_name}}</p>
                                            </div>
                                            @break                                        
                                    @endswitch
                                @endforeach
                            </div>
                        {{-- /SERVICES --}}
                        </div>
                    {{-- /BOOTSTRAP ROW --}}
                    </div>
                {{-- /RIGHT COLUMN --}}    
                </div>
            {{-- /BOOTSTRAP ROW --}}    
            </div>

            {{-- BOOTSTRAP ROW --}}
            <div class="row">
                <div class="col-12">
                    <div class="wrap_address">
                        <span class="info_title">INDIRIZZO: </span>
                        <span class="acc_address"><i class="acc_address_ico fas fa-map-marker-alt"></i>  {{$accomodation->address}} - {{$accomodation->zip_code}} {{$accomodation->city}}</span>
                    </div>
                    {{-- <h2>Test TOM TOM Map</h2> --}}
                    {{-- MAP WRAPPER --}}
                    <div class="map_wrapper">
                        <div id="home_btn" class="d-flex">
                            <span>HOME</span>
                            <img class="map_home_btn_icon" src="{{asset('storage/map_image/map_icon_boolbnb.png')}}" alt="">
                        </div>
                        {{-- MAP DIV --}}
                        <div id='map' class='map'>
                        </div>
                    </div>
                </div>
            {{-- /BOOTSTRAP ROW --}}
            </div>
    

        {{-- WRAPPER topviews --}}
        </div>
    {{-- BOOTSTRAP CONTAINER --}}
    </div>
{{-- /SHOW section  --}}
</section>

@endsection

@section('footer')
    {{-- <div class="wrap_footer"> --}}
        @include('UI.Partials.footer')
    {{-- </div> --}}
@endsection

@section('src')
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.6.0/maps/maps-web.min.js'></script>
    <script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/search.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/show.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/map.js')}}"></script>
    {{-- JS Tom Tom Maps Api SDK --}}
@endsection

