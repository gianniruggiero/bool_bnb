{{-- UI SHOW --}}
@extends('UI.layouts.app')
@section('title')
    boolBnB
@endsection

@section('main_content')

{{-- SHOW section  --}}
<section class="show">
    {{-- BOOTSTRAP CONTAINER --}}
    <div class="container">
        {{-- BOOTSTRAP ROW --}}
        <div class="row">
            {{-- TITOLO SEZIONE --}}
            <div class="col-12">
                <h2 class="title text-center">{{$accomodation->title}}</h2>
                <span class="btn_std text-center">> CONTATTA L'HOST</span>
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
                    <img class="img_topviews" src="{{$accomodation->cover_image}}" alt="">
                    <div class="gallery_topviews">
                        <img class="thumbnail" src="{{$accomodation->cover_image}}" data-url="{{$accomodation->cover_image}}" alt="immagine alloggio principale">    
                        @foreach ($accomodation->accomodation_images as $acc_image)
                        {{-- @if ($acc_image->principal) --}}
                            <img class="thumbnail" src="{{$acc_image->image}}" data-url="{{$acc_image->image}}" alt="immagine alloggio di dettaglio">    
                        {{-- @endif --}}
                        @endforeach
                    </div>
                {{-- /COLONNA SINISTRA --}}
                </div>
                
                {{-- /COLONNA DESTRA --}}
                <div class="col-12 col-lg-6">
                    {{-- TITOLO --}}
                    <h5 class="acc_title">{{$accomodation->accomodation_type->name}}</h5>
                    <p class="acc_address"><i class="acc_address_ico fas fa-map-marker-alt"></i>  {{$accomodation->address}} - {{$accomodation->zip_code}} {{$accomodation->city}}</p>
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
                {{-- /COLONNA DESTRA --}}    
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

@section('src')
    <script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/search.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/show.js')}}"></script>

@endsection

