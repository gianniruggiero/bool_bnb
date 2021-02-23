// Chiama la document ready function
$(document).ready(function() {

    setImgtopviewsHeight();
    setThumbanilTopviewsHeight();


    // SCROLL-BAR EVENT per gestione opacity Header
    $(window).scroll(function() {
        // Calcola la soglia per cambiare opacità
        var header_no_opacity = $(".jumbo").height() + parseInt($(".jumbo").css('top')) - $("header").height();
        // header_no_opacity += parseInt($(".jumbo").css('top'));
        // Ottiene l'attuale posizione della scroll-bar
        var scrollTop = $(this).scrollTop();
        // Controllo per decidere livello opacità dell'Header
        if (scrollTop > header_no_opacity) {
            // Scrollbar più alta del jumbo: Header diventa bianco con ombra
            $("header").addClass("header_white");
            $("header").removeClass("header_black_opacity");

        } else {
            if (scrollTop < parseInt($(".jumbo").css('top'))) {
                // Scrollbar più bassa dell'altezza dell'Header: Header diventa nero, senza ombra
                $("header").removeClass("header_white");
                $("header").removeClass("header_black_opacity");

            } else {
                // Scrollbar compresa tra header e jumbo: Header diventa nero con opacity 0.7, senza ombra
                $("header").removeClass("header_white");
                $("header").addClass("header_black_opacity");
            }
        }
    });

    // Flag che dice se è già attivo un setInterval() per la scroll automatica della Gallery nella section on_evidence in UI.accomdoations.home
    var setIntervalGalleryOn = false;
    
    // ARROW-PREV evento Click -  genera uno scroll automatico
    $(".prev_arrow").click(function() {
        // Definisce l'ampiezza massima della Scroll-bar
        var maxScrollLeft = parseInt($(".gallery")[0].scrollWidth - $(".gallery").width());
        // Definisce posizione attuale della Scroll-bar
        var scrollStart = parseInt($(".gallery").scrollLeft()); 
        // Definisce contatore dei pixel per lo spostamento della Scroll-bar
        var scrollCounter = 0;
        // Definisce la misura dello scroll al click
        var scrollVal = 400;
        // Cotrolla che la posizione della scroll--bar non sia a fine corsa
        if (scrollStart > 0) {
            // Confronta se la misura dello scroll automatico (scrollVal) è inferiore alla misura effettiva per arrivare a finecorsa
            if (scrollStart < scrollVal) {
                // Imposta come misura di scorrimento automatico (scrollVal) la misura per arrivare a fine corsa
                scrollVal = scrollStart;
            }
            // Controlla che non ci siano altri timerr già attivi
            if (!setIntervalGalleryOn) {
                // Fa partire il setInterval()
                id = setInterval(() => {
                    setIntervalGalleryOn = true;
                    // Numero di pixel di cui viene spostata la Scroll-bar
                    scrollCounter += 4;
                    // Sposta la Scroll-bar del valore in pixel definito in scrollCounter
                    $(".gallery").scrollLeft(scrollStart - scrollCounter);
                    // Controlla se lo Scroll-bar si è già spostata del valore dello spostamento automatico (scrollVal)
                    if (scrollCounter > scrollVal) {
                        // Resetta tutte le variabili
                        scrollCounter = 0;
                        scrollStart = 0;
                        setIntervalGalleryOn = false;
                        scrollVal = 400;
                        // ferma il timer
                        clearInterval(id);
                    }
                }, 2);
            }
        }
    });

    // ARROW-NEXT evento Click - genera uno scroll automatico
    $(".next_arrow").click(function (){
        // Definisce l'ampiezza massima della Scroll-bar
        var maxScrollLeft = parseInt($(".gallery")[0].scrollWidth - $(".gallery").width());
        // Definisce posizione attuale della Scroll-bar
        var scrollStart = parseInt($(".gallery").scrollLeft()); 
        // Definisce contatore dei pixel per lo spostamento della Scroll-bar
        var scrollCounter = 0;
        // Definisce la misura dello scroll al click
        var scrollVal = 400;

        // Cotrolla che la posizione della scroll--bar non sia a fine corsa
        if (scrollStart <= maxScrollLeft) {
            // Confronta se la misura dello scroll automatico (scrollVal) è inferiore alla misura effettiva per arrivare a finecorsa
            if (maxScrollLeft - scrollStart < scrollVal) {
                // Imposta come misura di scorrimento automatico (scrollVal) la misura per arrivare a fine corsa
                scrollVal = maxScrollLeft - scrollStart;
            }
            // Controlla che non ci siano altri timerr già attivi
            if (!setIntervalGalleryOn) {
                // Fa partire il setInterval()
                id = setInterval(() => {
                    setIntervalGalleryOn = true;
                    // Numero di pixel di cui viene spostata la Scroll-bar
                    scrollCounter += 4;
                    // Sposta la Scroll-bar del valore in pixel definito in scrollCounter
                    $(".gallery").scrollLeft(scrollStart + scrollCounter);
                    // Controlla se lo Scroll-bar si è già spostata del valore dello spostamento automatico (scrollVal)
                    if (scrollCounter > scrollVal) {
                        // Resetta tutte le variabili
                        scrollCounter = 0;
                        scrollStart = 0;
                        setIntervalGalleryOn = false;
                        scrollVal = 400;
                        // ferma il timer
                        clearInterval(id);
                    }
                }, 2);
            }
        }
    });


    // GALLERY ON EVIDENCE - evento scroll
    $(".gallery").scroll (function(){
        // Definisce l'ampiezza massima della Scroll-bar
        var maxScrollLeft = parseInt($(".gallery")[0].scrollWidth - $(".gallery").width());

        // Controlla la posizione della Scroll-bar per visualizzare o meno le arrows PREV e NEXT
        if (parseInt($(this).scrollLeft()) >= (maxScrollLeft - 1)) {
            // Nasconde la NEXT_arrow
            $(".next_arrow").addClass("invisible");
        } else if (parseInt($(this).scrollLeft()) == 0) {
            // Nasconde la PREV_arrow
            $(".prev_arrow").addClass("invisible");
        } else {
            // Fa comparire NEXT e PREV arrows
            $(".prev_arrow").removeClass("invisible");
            $(".next_arrow").removeClass("invisible");
        };
    });

    // GALLERY TOPVIEWS - evento mouseenter
    $(".gallery_topviews").on ("click", ".thumbnail", function(){
        var newImage = $(this).attr("data-url");
        $(".img_topviews").attr("src", newImage);
        $(".thumbnail").css("opacity", 0.4);
        $(this).css("opacity", 1);
    });

    window.addEventListener("resize", function(e) {
        setImgtopviewsHeight();
        setThumbanilTopviewsHeight();
    });

// chiusura "document ready function"
});

// funzione che imposta altezza dell'immagine principale della topviews pari a una percentuale della sua larghezza
function setImgtopviewsHeight() {
    var newHeight = parseInt($(".img_topviews").css("width")) * 0.7;
    console.log("height: " + newHeight);
    $(".img_topviews").css("height", newHeight);
}

// funzione che imposta altezza dell'immagine principale delle immagini thumbnail della topviews
function setThumbanilTopviewsHeight() {
    var newHeight = parseInt($(".thumbnail").css("width")) * 0.7;
    console.log("height: " + newHeight);
    $(".thumbnail").css("height", newHeight);
}


