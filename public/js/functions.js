/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/functions.js":
/*!***********************************!*\
  !*** ./resources/js/functions.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Chiama la document ready function
$(document).ready(function () {
  setImgtopviewsHeight();
  setThumbanilTopviewsHeight(); // SCROLL-BAR EVENT per gestione opacity Header

  $(window).scroll(function () {
    // Calcola la soglia per cambiare opacità
    var header_no_opacity = $(".jumbo").height() + parseInt($(".jumbo").css('top')) - $("header").height(); // header_no_opacity += parseInt($(".jumbo").css('top'));
    // Ottiene l'attuale posizione della scroll-bar

    var scrollTop = $(this).scrollTop(); // Controllo per decidere livello opacità dell'Header

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
  }); // Flag che dice se è già attivo un setInterval() per la scroll automatica della Gallery nella section on_evidence in UI.accomdoations.home

  var setIntervalGalleryOn = false; // ARROW-PREV evento Click -  genera uno scroll automatico

  $(".prev_arrow").click(function () {
    // Definisce l'ampiezza massima della Scroll-bar
    var maxScrollLeft = parseInt($(".gallery")[0].scrollWidth - $(".gallery").width()); // Definisce posizione attuale della Scroll-bar

    var scrollStart = parseInt($(".gallery").scrollLeft()); // Definisce contatore dei pixel per lo spostamento della Scroll-bar

    var scrollCounter = 0; // Definisce la misura dello scroll al click

    var scrollVal = 400; // Cotrolla che la posizione della scroll--bar non sia a fine corsa

    if (scrollStart > 0) {
      // Confronta se la misura dello scroll automatico (scrollVal) è inferiore alla misura effettiva per arrivare a finecorsa
      if (scrollStart < scrollVal) {
        // Imposta come misura di scorrimento automatico (scrollVal) la misura per arrivare a fine corsa
        scrollVal = scrollStart;
      } // Controlla che non ci siano altri timerr già attivi


      if (!setIntervalGalleryOn) {
        // Fa partire il setInterval()
        id = setInterval(function () {
          setIntervalGalleryOn = true; // Numero di pixel di cui viene spostata la Scroll-bar

          scrollCounter += 4; // Sposta la Scroll-bar del valore in pixel definito in scrollCounter

          $(".gallery").scrollLeft(scrollStart - scrollCounter); // Controlla se lo Scroll-bar si è già spostata del valore dello spostamento automatico (scrollVal)

          if (scrollCounter > scrollVal) {
            // Resetta tutte le variabili
            scrollCounter = 0;
            scrollStart = 0;
            setIntervalGalleryOn = false;
            scrollVal = 400; // ferma il timer

            clearInterval(id);
          }
        }, 2);
      }
    }
  }); // ARROW-NEXT evento Click - genera uno scroll automatico

  $(".next_arrow").click(function () {
    // Definisce l'ampiezza massima della Scroll-bar
    var maxScrollLeft = parseInt($(".gallery")[0].scrollWidth - $(".gallery").width()); // Definisce posizione attuale della Scroll-bar

    var scrollStart = parseInt($(".gallery").scrollLeft()); // Definisce contatore dei pixel per lo spostamento della Scroll-bar

    var scrollCounter = 0; // Definisce la misura dello scroll al click

    var scrollVal = 400; // Cotrolla che la posizione della scroll--bar non sia a fine corsa

    if (scrollStart <= maxScrollLeft) {
      // Confronta se la misura dello scroll automatico (scrollVal) è inferiore alla misura effettiva per arrivare a finecorsa
      if (maxScrollLeft - scrollStart < scrollVal) {
        // Imposta come misura di scorrimento automatico (scrollVal) la misura per arrivare a fine corsa
        scrollVal = maxScrollLeft - scrollStart;
      } // Controlla che non ci siano altri timerr già attivi


      if (!setIntervalGalleryOn) {
        // Fa partire il setInterval()
        id = setInterval(function () {
          setIntervalGalleryOn = true; // Numero di pixel di cui viene spostata la Scroll-bar

          scrollCounter += 4; // Sposta la Scroll-bar del valore in pixel definito in scrollCounter

          $(".gallery").scrollLeft(scrollStart + scrollCounter); // Controlla se lo Scroll-bar si è già spostata del valore dello spostamento automatico (scrollVal)

          if (scrollCounter > scrollVal) {
            // Resetta tutte le variabili
            scrollCounter = 0;
            scrollStart = 0;
            setIntervalGalleryOn = false;
            scrollVal = 400; // ferma il timer

            clearInterval(id);
          }
        }, 2);
      }
    }
  }); // GALLERY ON EVIDENCE - evento scroll

  $(".gallery").scroll(function () {
    // Definisce l'ampiezza massima della Scroll-bar
    var maxScrollLeft = parseInt($(".gallery")[0].scrollWidth - $(".gallery").width()); // Controlla la posizione della Scroll-bar per visualizzare o meno le arrows PREV e NEXT

    if (parseInt($(this).scrollLeft()) >= maxScrollLeft - 1) {
      // Nasconde la NEXT_arrow
      $(".next_arrow").addClass("invisible");
    } else if (parseInt($(this).scrollLeft()) == 0) {
      // Nasconde la PREV_arrow
      $(".prev_arrow").addClass("invisible");
    } else {
      // Fa comparire NEXT e PREV arrows
      $(".prev_arrow").removeClass("invisible");
      $(".next_arrow").removeClass("invisible");
    }

    ;
  }); // GALLERY TOPVIEWS - evento mouseenter

  $(".gallery_topviews").on("click", ".thumbnail", function () {
    var newImage = $(this).attr("data-url");
    $(".img_topviews").attr("src", newImage);
    $(".thumbnail").css("opacity", 0.4);
    $(this).css("opacity", 1);
  });
  window.addEventListener("resize", function (e) {
    setImgtopviewsHeight();
    setThumbanilTopviewsHeight();
  }); // chiusura "document ready function"
}); // funzione che imposta altezza dell'immagine principale della topviews pari a una percentuale della sua larghezza

function setImgtopviewsHeight() {
  var newHeight = parseInt($(".img_topviews").css("width")) * 0.7;
  console.log("height: " + newHeight);
  $(".img_topviews").css("height", newHeight);
} // funzione che imposta altezza dell'immagine principale delle immagini thumbnail della topviews


function setThumbanilTopviewsHeight() {
  var newHeight = parseInt($(".thumbnail").css("width")) * 0.7;
  console.log("height: " + newHeight);
  $(".thumbnail").css("height", newHeight);
}

/***/ }),

/***/ 3:
/*!*****************************************!*\
  !*** multi ./resources/js/functions.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\boolean_esercizi\bool_bnb\resources\js\functions.js */"./resources/js/functions.js");


/***/ })

/******/ });