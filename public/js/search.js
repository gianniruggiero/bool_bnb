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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/search.js":
/*!********************************!*\
  !*** ./resources/js/search.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// SEARCH INPUT / evento click, si allarga
$(".input_search").click(function () {
  $(".search_box").addClass("max_search_bar");
  $(".search_results_panel").removeClass("invisible");
}); // SEARCH ICON / evento click, chiama route per la search_page

$(".search_icon").click(function (event) {
  if (!$(this).hasClass("active_search_ico")) {
    event.preventDefault();
  } else {
    // togliamo stile attivo alla search-icon
    $(".search_icon").removeClass("active_search_ico"); // minimizza la search-bar

    $(".search_box").removeClass("max_search_bar"); // elimina tutti i risultati dal ul del pannello

    $(".search_results_ul >li").remove(); // cancella il testo digitato nella input search

    $(".input_search").val("");
  }
}); // EVENTO CLICK fuori dal results panel

window.onclick = function (event) {
  var panel = document.getElementById('results_panel');
  var inputsearch = document.getElementById('input_search');
  var searchicon = document.getElementById('search_form'); // Controlla che il genitore dell'elemento cliccato non è results_panel e non è nemmeno la input search    

  if (event.target.offsetParent !== panel && event.target !== inputsearch && event.target.offsetParent !== searchicon) {
    // togliamo stile attivo alla search-icon
    $(".search_icon").removeClass("active_search_ico"); // minimizza la search-bar

    $(".search_box").removeClass("max_search_bar"); // elimina tutti i risultati dal ul del pannello

    $(".search_results_ul >li").remove(); // cancella il testo digitato nella input search

    $(".input_search").val("");
  }
}; // EVENTO CLICK su lista risultati ricerca autocomplete


$(".search_results_panel").on("click", ".result_item", function () {
  var item_scelta = $.trim($(this).text());
  $(".input_search").val($(this).attr("data-city") + " (" + $(this).attr("data-provincia") + ")"); // elimina tutti i risultati dal ul del pannello

  $(".search_results_panel").addClass("invisible"); // cambia colore all'icona

  $(".search_icon").addClass("active_search_ico"); // Copia latitudine e longitudine dai data-attirbute del <li> cliccato negli input hidden del search_form

  $(".search_lat").val($(this).attr("data-lat"));
  $(".search_lgt").val($(this).attr("data-lgt"));
  $(".search_beds").val(1);
  $(".search_toilets").val(1);
  $(".search_rooms").val(1);
  $(".search_visible").val(1);
  $(".search_services").val("sauna");
}); // SEARCH INPUT / minimizza search-bar e chiude pannello risultati
// $(".search_box").focusout(function(event) {
//     // togliamo stile attivo alla search-icon
//     $(".search_icon").removeClass("active_search_ico");
//     // minimizza la search-bar
//     $(".search_box").removeClass("max_search_bar");
//     // elimina tutti i risultati dal ul del pannello
//     $(".search_results_ul >li").remove();
//     // elimina tutti i risultati dal ul del pannello
//     $(".input_search").val("");
// });
// SEARCH INPUT / autocomplete tramite chiamata Tom Tom Api Ajax
// Funzione richiamata ogni volta che l'utente digita nella input della search bar

$(".input_search").keyup(function () {
  // Memorizziamo quanto digitato nella input della search bar
  var location = $.trim($(".input_search").val()); // Controlla che siano stati digitati almeno 3 caratteri

  if (location.length > 1) {
    console.log(location); // Prepariamo la URL per la chiamata AJax all'API TOM TOM

    var tomtomQueryString = "https://api.tomtom.com/search/2/search/" + location + ".json?typeahead=true&limit=10&countrySet=ITA&language=it-IT&extendedPostalCodesFor=Geo&minFuzzyLevel=1&maxFuzzyLevel=2&idxSet=PAD,POI%2CGeo%2CStr&view=Unified&key=5f9vpvhd3dCu5qyQPFDmWnkS1fQQ1Yrg"; // Selezioniamo il template handlebar per riempire la lista con i risultati della chiamata

    var source = $("#search-results-li-template").html();
    var template = Handlebars.compile(source); // Facciamo chiamta Ajax alla API TOM TOM per avere lista risultati per Autocomplete

    $.ajax({
      "url": tomtomQueryString,
      "method": "GET",
      "success": function success(data) {
        // Array per raccogliere i risultati della chiamata API
        var results = data.results;
        console.log(results); // Ad ogni digit cancelliamo la lista di risultati precedenti

        $(".search_results_ul >li").remove(); // Cicliamo sui risultati di data.results

        for (var i = 0; i < results.length; i++) {
          // LATITUDINE
          var latitude = results[i].position.lat; // LONGITUDINE

          var longitude = results[i].position.lon; // COMUNE

          var municipality = results[i].address.municipality; // INDIRIZZO (via, piazza, ecc)

          var streetname = results[i].address.streetName; // NUMERO CIVICO

          if (results[i].address.streetNumber) {
            var streetnumber = ", " + results[i].address.streetNumber;
          } // CAP


          if (results[i].address.postalCode) {
            var postalcode = " - " + results[i].address.postalCode;
          } // PROVINCIA


          if (results[i].address.countrySecondarySubdivision) {
            var provincia = results[i].address.countrySecondarySubdivision.toUpperCase();
          } // POI - Point Of Interests by Tom Tom Api


          if (results[i].poi) {
            var poi_name = results[i].poi.name;
          } // Prepariamo i dati da passare al template di Handlebars


          var dataTom = {
            "comune": municipality,
            "via": streetname,
            "civico": streetnumber,
            "cap": postalcode,
            "latitude": latitude,
            "longitude": longitude,
            "provincia": provincia,
            "poi_name": poi_name
          }; // Manipoliamo HTML compilando il template

          var html = template(dataTom); // Appendiamo HTML manipolato all'ul

          $(".search_results_ul").append(html);
        }
      },
      "error": function error(err) {}
    });
  } else {
    // elimina tutti i risultati dal ul del pannello
    $(".search_results_ul >li").remove();
  }
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/search.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\boolean_esercizi\bool_bnb\resources\js\search.js */"./resources/js/search.js");


/***/ })

/******/ });