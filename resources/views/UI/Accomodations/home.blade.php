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
                    <h6 class="sub-title">> CERCA UN ALLOGGIO CON LA RICERCA AVANZATA</h6>
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
                    <h6 class="sub-title">> REGISTRATI E DIVENTA UN HOST</h6>
                    <div class="wrap_img">
                        <a href="#">
                            <img src="{{asset('storage/images/host.jpg')}}" alt="host">
                            <div class="overlay">
                                <i class="overlay_ico fas fa-pen icn"></i> 
                            </div>
                        </a>    
                    </div>
                    <p class="text">Se hai una stanza in più, un piano o un'intera casa disponibili, puoi avere un guadagno condividendoli con persone provenienti da tutto il mondo. Con noi puoi affittare il tuo spazio: spetta solo a te decidere da quando. <a class="info_link" href="">Inizia ad ospitare!</a></p>
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
                <h2 class="title text-center">In evidenza</h2>
                <h6 class="sub-title text-center">LA VETRINA DI BOOLBNB, UNA SELEZIONE DI ANNUNCI SPONSORIZZATI</h6>
                <div class="wrap_gallery d-flex">
                    <div class="arrow prev_arrow d-flex align-items-center justify-content-center invisible"><i class="ico_arrow fas fa-angle-left"></i></div>
                    <div class="gallery d-flex">
                        @foreach ($sponsoredAccomodations as $accomodation)
                            <div class="card_gallery">
                                {{-- <h6>{{$accomodation->title}}</h6> --}}
                                <img src="{{$accomodation->cover_image}}" alt="accomodation image">
                                <h6 class="card_title"><i class="gallery_ico fas fa-map-marker-alt"></i> {{$accomodation->city}}</h6>
                                <h6 class="card_hover_title card_title"><i class="home_ico fas fa-home"></i> {{$accomodation->title}}</h6>
                            </div>
                        @endforeach
                    </div>
                    <div class="arrow next_arrow d-flex align-items-center justify-content-center"><i class="ico_arrow fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- /IN EVIDENZA section  --}}

{{-- TIPOLOGIA section  --}}
<section class="tipology">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title text-center">Sfoglia per categoria</h2>
                <h6 class="sub-title text-center">LE PROPOSTE DI BOOLBNB RAGGRUPPATE PER TIPOLOGIA</h6>
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
</section>
{{-- /TIPOLOGIA section  --}}



@endsection

@section('src')
    <script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/search.js')}}"></script>
@endsection





