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


    // CONTACT HOST section open/close
    var btnContactHost = document.getElementById("btn_contact_host");
    var contact = document.getElementById("sec_contact");
    var inputs = document.getElementById("inputs");
    btnContactHost.addEventListener("click", function(){
        contact.classList.toggle ('contact_open');
        if (contact.classList.contains('contact_open')) {
            // setup btn text for closing action
            var strHtml = "<i class='fas fa-angle-double-up'></i><span> CONTATTA L'HOST</span>";
            btnContactHost.innerHTML = strHtml;
        } else {
            // setup btn text for open action
            var strHtml = "<i class='fas fa-angle-double-down'></i><span> CONTATTA L'HOST</span>";
            btnContactHost.innerHTML = strHtml;
            // Delete all input values
            var arrayInputs = document.getElementsByClassName("form_input");
            for (let index = 0; index < arrayInputs.length; index++) {
                console.log(arrayInputs[index].value);
                arrayInputs[index].value = "";
            }

            console.log("$.label:");
            console.log($('.label').text);

            var arrayLabels = document.getElementsByClassName("label");
            for (let index = 0; index < arrayLabels.length; index++) {
                arrayLabels[index].innerHTML = "";
            }


            // console.log("Length: " + arrayInputs.length);
            // console.log(document.getElementsByClassName("form_input"));
        }
        inputs.classList.toggle('wrap_inputs_visible')
    });

    // SEND MESSAGE #btn_send click event
    var btnSend = document.getElementById("btn_send"); 
    btnSend.addEventListener("click", function(){

        var accomodationId = document.getElementById("accomodation_id").value;
        var inputEmail = document.getElementById("email").value;
        var inputNickname = document.getElementById("nickname").value;
        var inputTextMessage = document.getElementById("text_message").value;

        console.log(accomodationId + " - " + inputEmail + " - " + inputNickname + " - " + inputTextMessage);

        // VALIDATION errors flag
        var inputErrors = false;

        // RESET all labels
        var arrayLabels = document.getElementsByClassName("label");
        for (let index = 0; index < arrayLabels.length; index++) {
            arrayLabels[index].innerHTML = "";
        }

        // EMAIL validation
        if (inputEmail.length == 0) {
            document.getElementById("email_label").innerText = "Email richiesta";
            inputErrors = true;
        } else if(ValidateEmail(inputEmail) == false) {
            document.getElementById("email_label").innerText = "Formato email non valido";
            inputErrors = true;
        }

        // NIKCNAME validation
        if (inputNickname.length == 0) {
            document.getElementById("nickname_label").innerText = "Nome o Nickname richiesto";
            inputErrors = true;
        } else if (inputNickname.length < 3) {
            document.getElementById("nickname_label").innerText = "Richiesti min. 3 caratteri per il Nickname";
            inputErrors = true;
        }

        if (inputErrors) {
            return;
        }


        $.ajax 
        (   
            {
            "url": "http://localhost:8000/api/messages/",
            "data" : {
                "accomodation_id": accomodationId,
                "email": inputEmail,
                "nickname": inputNickname,
                "text_message": inputTextMessage,
            },
            "method" : "POST",
            "success" : function (data) {
                console.log(data);
                alert ("Il messaggio è stato inviato all'HOST!");
                // Closes the Contact section
                $('#sec_contact').removeClass("contatc_open");
            },
            "error" : function (error) {
                alert("ERROR: " + error.status + " - " + error.statusText + '\n' + error.responseJSON.result);
                console.log(error);
            }
        });
    });
    

    })

    
    





// chiusura "document ready function"



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

function ValidateEmail(mail) 
{
    
 if (/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(mail))
  {
    return (true)
  }
    return (false)
};


