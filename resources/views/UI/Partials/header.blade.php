<header>
    <div class="header_top">
        <div class="container-fluid">
            {{-- row BOOTSTRAP--}}
            <div class="row">
                {{-- HEADER TOP --}}
                    <!-- Navbar SX-->
                    <nav class="left d-flex align-items-center col-4 col-sm-6 col-md-2 col-lg-3 col-xl-3">
                        <a href="{{route('home')}}"><img class="logo logo_black_header" src="{{asset('storage/images/logo_boolbnb_w.png')}}" alt="logo boolBnB"></a>
                        <a href="{{route('home')}}"><img class="logo logo_white_header" src="{{asset('storage/images/logo_boolbnb_b.png')}}" alt="logo boolBnB"></a>

                    </nav>

                    <!-- Navbar CX-->
                    <nav class="center d-flex align-items-center justify-content-center order-3 order-sm-3 order-md-2 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        {{-- SEARCH BOX --}}
                        <div class="search_box d-flex align-items-center justify-content-center">
                            <div class="search_bar d-flex d-none justify-content-center align-items-center">
                                <div class="left_circle"></div>
                                <input id="input_search" class="input_search" type="text" placeholder="Dove vai?">
                                <form class="search_form" action="{{route('search')}}" method="GET" enctype="multipart/form-data">
                                    @csrf
                                    @method('GET')
                                    <input class="search_lat" type="hidden" name="latitude">
                                    <input class="search_lgt" type="hidden" name="longitude">
                                    <input class="search_beds" type="hidden" name="beds">
                                    <input class="search_toilets" type="hidden" name="toilets">
                                    <input class="search_rooms" type="hidden" name="rooms">
                                    <input class="search_visible" type="hidden" name="visible">
                                    <input class="search_services" type="hidden" name="services[]">
                                    <button class="btn_search_icon" type="submit"><i class="search_icon fas fa-search-location"></i></button>
                                </form>
                                <div class="right_circle"></div>
                            </div>
                            <div id="results_panel" class="search_results_panel">
                                {{-- Lista dei risultati da chiamata Api Tom Tom per Autocomplete --}}
                                <ul class="search_results_ul">
                                    <script id="search-results-li-template" type="text/x-handlebars-template">
                                        <li id="result-item" class="list-inline result_item" data-city="@{{comune}}" data-provincia="@{{provincia}}" data-lat="@{{latitude}}" data-lgt="@{{longitude}}">
                                            @{{# if poi_name}}
                                                <div class="poi_name"><i class="poi_ico fas fa-map-marker-alt"></i> @{{poi_name}}</div>
                                            @{{else}}    
                                                <i class="home_ico fas fa-home"></i>
                                            @{{/if}}
                                            @{{via}}@{{civico}}@{{cap}} <strong>@{{comune}}</strong> (@{{provincia}})
                                        </li>
                                    </script>
                                </ul> 
                            </div>
                        </div>
                    </nav>

                    <!-- Navbar DX-->
                    <nav class="right d-flex justify-content-end align-items-center order-2 order-sm-2 col-8 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                        <!-- Authentication Links -->
                        @guest
                            <a class="link_header" href="{{ route('login') }}">
                                <i class="login_icon fas fa-user icn"></i> {{ __('Accedi') }}
                            </a>
                        @if (Route::has('register'))
                            <a class="link_header" href="{{ route('register') }}">
                                <i class="register_icon fas fa-pen icn"></i> {{ __('Registrati') }}
                            </a>
                        @endif
                        @else
                            <a class="link_header" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} 
                                <i class="fas fa-chevron-down icn"></i>
                                <ul class="dropdown_menu">
                                    <li  href="{{asset('admin/accomodations')}}" class="list_item">
                                        Accomodations Area
                                    </li>
                                    <li class="list_item">
                                        Advertising Area
                                    </li>
                                    <li class="list_item">
                                        Message Area
                                    </li>
                                    <li class="list_item">
                                        Homepage
                                    </li>
                                </ul>
                            </a>
                            <a class="link_header" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt icn"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </nav>
            </div>
            {{-- /HEADER TOP  --}}
        </div>
        {{-- /row BOOTSTRAP--}}
    </div>    
    {{-- /container-fluid --}}

</header>