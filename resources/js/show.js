// Chiama la document ready function
$(document).ready(function() {

    setImgtopviewsHeight();
    setThumbanilTopviewsHeight();
    // alert("sono arrivato");
    // $("header").removeClass("header_black_opacity");

    // GALLERY TOPVIEWS - evento click
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


