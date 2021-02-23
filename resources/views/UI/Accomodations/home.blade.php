{{-- UI HOMEPAGE --}}
@extends('UI.layouts.app')
@section('title')
    boolBnB
@endsection
@section('main_content')
@include('UI.Partials.jumbotron')

{{-- INFO section --}}
<section class="info_section">
    <div class="container">
        <div class="row">
            {{-- TRAVELLER --}}
            <div class="traveller col-12 col-lg-6">
                <div class="card_info">
                    <h2 class="title">Sei in partenza?</h2>
                    <h6 class="sub-title">CERCA UN ALLOGGIO CON LA RICERCA AVANZATA</h6>
                    <div class="wrap_img">
                        <a href="#">
                            <img src="{{asset('storage/images/traveller.jpg')}}" alt="traveller"> 
                            <div class="overlay">
                                <i class="overlay_ico fas fa-search-location"></i>
                            </div>
                        </a>
                    </div>
                    <p class="text">Stai cercando una stanza per una notte, la casa per le vacanze con la famiglia o una sistemazione per la trasferta di lavoro? Parcheggio e wi-fi per te sono dei "must-have"? Verifica gli alloggi disponbili e tutte le tue esigenze con la <a class="info_link" href="">ricerca avanzata</a>.</p>
                </div>
            </div>
            {{-- HOST --}}
            <div class="host col-12 col-lg-6">
                <div class="card_info">
                    <h2 class=title>Vuoi aprire la tua porta?</h2>
                    <h6 class="sub-title">REGISTRATI E DIVENTA UN HOST</h6>
                    <div class="wrap_img">
                        <a href="#">
                            <img src="{{asset('storage/images/host.jpg')}}" alt="host">
                            <div class="overlay">
                                <i class="overlay_ico fas fa-pen icn"></i> 
                            </div>
                        </a>    
                    </div>
                    <p class="text">Se hai una stanza in più, un piano o un'intera casa disponibili, puoi avere un guadagno condividendoli con persone provenienti da tutto il mondo. Con noi puoi affittare il tuo spazio: spetta solo a te decidere da quando. <a class="info_link" href="">Registrati ed inizia ad ospitare!</a></p>
                </div>
            </div>
        </div>
    </div>
{{-- /INFO section --}}
</section>

{{-- IN EVIDENZA section  --}}
<section class="on_evidence">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title">In evidenza</h2>
                <h6 class="sub-title">LA VETRINA DI BOOLBNB, SCORRI GLI ANNUNCI</h6>
                <div class="wrap_gallery d-flex">
                    <div class="arrow prev_arrow d-flex align-items-center justify-content-center invisible"><i class="ico_arrow fas fa-angle-left"></i></div>
                    <div class="gallery d-flex">
                        @foreach ($sponsoredAccomodations as $accomodation)
                            <div class="card_gallery">
                                {{-- <h6>{{$accomodation->title}}</h6> --}}
                                <a href="{{route('show', $accomodation->slug)}} ">
                                    <img src="{{$accomodation->cover_image}}" alt="accomodation image">
                                    <h6 class="card_title"><i class="gallery_ico fas fa-map-marker-alt"></i> {{$accomodation->city}}</h6>
                                    <h6 class="card_hover_title card_title"><i class="home_ico fas fa-home"></i> {{$accomodation->title}}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="arrow next_arrow d-flex align-items-center justify-content-center"><i class="ico_arrow fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
{{-- /IN EVIDENZA section  --}}
</section>

{{-- TIPOLOGIA section  --}}
<section class="tipology">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title text-center">Sfoglia per categoria</h2>
                <h6 class="sub-title text-center">CHE TIPO DI ALLOGGIO CERCHI?</h6>
            </div>
        </div>
        
        <div class="row">
            @foreach ($types as $type)
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="wrap_img">
                        <a href="{{route('search_type', $type->id)}}">
                            <img src="{{$type->image}}" alt="accomodation image">
                            <div class="overlay">
                                <h5 class="type_title">{{$type->name}}</h5>
                            </div>
                        </a>    
                    </div>
                </div>
            @endforeach
        </div>
    </div>
{{-- /TIPOLOGIA section  --}}
</section>

{{-- TOPVIEWS section  --}}
<section class="topviews">
    {{-- BOOTSTRAP CONTAINER --}}
    <div class="container">
        {{-- BOOTSTRAP ROW --}}
        <div class="row">
            {{-- TITOLO SEZIONE --}}
            <div class="col-12">
                <h2 class="title text-center">Il più visitato</h2>
                <h6 class="sub-title text-center"> L'ALLOGGIO BOOLBNB CON TOP VIEWS</h6>
            </div>
        {{-- /BOOTSTRAP ROW --}}
        </div>
        {{-- WRAPPER topviews --}}
        <div class="wrap_topviews">
            {{-- /BOOTSTRAP ROW --}}
            <div class="row">
                {{-- COLONNA SINISTRA --}}
                <div class="col-12 col-lg-6">
                    {{-- COVER IMAGE --}}
                    <a href="{{route("show", $mostViewedAccomodation->slug)}}">
                        <img class="img_topviews" src="{{$mostViewedAccomodation->cover_image}}" alt="">
                    </a>
                    <div class="gallery_topviews">
                        <img class="thumbnail" src="{{$mostViewedAccomodation->cover_image}}" data-url="{{$mostViewedAccomodation->cover_image}}" alt="immagine alloggio principale">    
                        @foreach ($mostViewedAccomodation->accomodation_images as $acc_image)
                        @if ($acc_image->principal)
                            <img class="thumbnail" src="{{$acc_image->image}}" data-url="{{$acc_image->image}}" alt="immagine alloggio di dettaglio">    
                        @endif
                        @endforeach
                    </div>
                {{-- /COLONNA SINISTRA --}}
                </div>
                
                {{-- /COLONNA DESTRA --}}
                <div class="col-12 col-lg-6">
                    {{-- TITOLO --}}
                    <h5 class="acc_title">{{$mostViewedAccomodation->title}}</h5>
                    <p class="acc_address"><i class="acc_address_ico fas fa-map-marker-alt"></i>  {{$mostViewedAccomodation->address}} - {{$mostViewedAccomodation->zip_code}} {{$mostViewedAccomodation->city}}</p>
                    <p class="acc_description">{{ \Illuminate\Support\Str::words($mostViewedAccomodation->description, 30, " [...] ") }}</p>
                    <h6 class="acc_vedi_link"><a href="{{route("show", $mostViewedAccomodation->slug)}}">> VEDI ANNUNCIO COMPLETO</a></h6>
                    {{-- <p class="acc_description">{{$mostViewedAccomodation->description}}</p> --}}
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
                                    <p class="wrap_service"><i class="service_ico fas fa-ruler-combined"></i> mq: {{$mostViewedAccomodation->square_meters}}</p>
                                </div>
                                {{-- stanze --}}
                                <div class="col-6 col-sm-12">
                                    <p class="wrap_service"><i class="service_ico fas fa-warehouse"></i> stanze: {{$mostViewedAccomodation->rooms}}</p>
                                </div>
                                {{-- letti --}}
                                <div class="col-6 col-sm-12">
                                    <p class="wrap_service"><i class="service_ico fas fa-bed"></i> letti: {{$mostViewedAccomodation->beds}}</p>
                                </div>
                                {{-- toilets --}}
                                <div class="col-6 col-sm-12">
                                    <p class="wrap_service"><i class="service_ico fas fa-toilet"></i> bagni: {{$mostViewedAccomodation->toilets}}</p>
                                </div>
                                {{-- costo --}}
                                <div class="col-6 col-sm-12">
                                    <p class="wrap_service"><i class="service_ico fas fa-money-bill-wave"></i> € {{$mostViewedAccomodation->price}}</p>
                                </div>

                            </div>
                        </div>

                        {{-- COLONNA DX SERVICES EXTRA --}}
                        <div class="col-12 col-sm-6">
                            {{-- titolo colonna SERVIXI --}}
                            <h6 class="info_title">SERVIZI:</h6>
                            {{-- ciclo per stampare i servizi --}}
                            <div class="row">
                                @foreach ($mostViewedAccomodation->services as $service)
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
                {{-- /COLONNA DESTRA --}}    
                </div>
            {{-- /BOOTSTRAP ROW --}}    
            </div>

        {{-- WRAPPER topviews --}}
        </div>
    {{-- BOOTSTRAP CONTAINER --}}
    </div>
{{-- /TOPVIEWS section  --}}
</section>

{{-- @include('UI.Partials.footer') --}}
@endsection


@section('src')
    <script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/functions.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/search.js')}}"></script>
@endsection
