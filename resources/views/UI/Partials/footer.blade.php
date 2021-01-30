<footer>
    <div class="container">

        <div class="top">

            <div class="row">
    
                {{-- logo e info società --}}
                <div class="col-12 col-md-12 col-lg-3">
                    <img class="logo_footer" src="{{asset('storage/images/logo_boolbnb_b.png')}}" alt="logo boolBnB">
                    <h6 class="logo_subtitle">Un alloggio per ogni viaggio</h6>
                    <div class="wrap_address">
                        <div>Corso Eurasia, 7</div>
                        <div>20110 Milano (ITALY)</div>
                        <div>tel. 800.000.000</div>
                        <div>P.I. 0499X0Y50234</div>
                    </div>
                </div>
    
               
                {{-- navbar CATEGORIE --}}
                <div class="col-6 col-md-4 col-lg-3">
                    <nav>
                        <h6 class="list_title">CATEGORIE</h6>
                        <ul>
                            @foreach ($types as $type)
                                <li><a class="list_item" href="#">{{ucfirst($type->name)}}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                
                {{-- navbar NAVIGA --}}
                <div class="col-6 col-md-4 col-lg-3">
                    <nav>
                        <h6 class="list_title">NAVIGA</h6>
                        <ul>
                            <li><a class="list_item" href="#">Accedi (host)</a></li>
                            <li><a class="list_item" href="#">Registrati (host)</a></li>
                            <li><a class="list_item"href="#">Cerca alloggio</a></li>
                        </ul>
                    </nav>
                </div>
    
                {{-- abstract --}}
                <div class="col-12 col-md-4 col-lg-3">
                    <p class="abstract"><i class="fas fa-quote-left quote"></i>Questo è il luogo dove i viaggiatori incontrano gli host pronti ad ospitarli. Per una notte, una settimana o un mese, scopri quale sarà la tua nuova casa.<i class="fas fa-quote-right quote"></i></p>
                    <h6 class="ceo_name">Mario Rossix - boolBnB CEO</h6>
                </div>
                
    
            </div>
        </div>
        
        {{-- header bottom --}}
        <div class="bottom">
            <div class="row">
                <div class="col-12 col-sm-9">
                    <div class="side_copy">
                        <h6 class="copyrights">© 2021 BoolBnb, Inc. All rights reserved</h6>
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="side_social_links">
                        <i class="fab fa-facebook-square social_ico"></i>
                        <i class="fab fa-linkedin social_ico"></i>
                        <i class="fab fa-instagram-square social_ico"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>