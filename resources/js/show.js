// Call "document ready function"
$(document).ready(function() {
    
    // MAIN IMAGE height setting
    setImgtopviewsHeight();
    // THUMBNAIL IMAGES height setting
    setThumbanilTopviewsHeight();

    // THUMBNAIL IMAGES - click events
    $(".gallery_topviews").on ("click", ".thumbnail", function(){
        // GET url image from data-url attribute of the thumbnail image clicked
        var newImage = $(this).attr("data-url");
        // SET url image for the main image
        $(".img_topviews").attr("src", newImage);
        // SET opacity for all thumbanil images
        $(".thumbnail").css("opacity", 0.4);
        // SET opacity for the thumbanil image selected
        $(this).css("opacity", 1);
    });

    // WINDOW RESIZE event
    window.addEventListener("resize", function(e) {
        // MAIN IMAGE height setting
        setImgtopviewsHeight();
        // THUMBNAIL IMAGES height setting
        setThumbanilTopviewsHeight();
    });

    // CONTACT HOST section open/close
    var btnContactHost = document.getElementById("btn_contact_host");
    var contact = document.getElementById("sec_contact");
    var inputs = document.getElementById("inputs");
    // CONTACT HOST button - click event
    btnContactHost.addEventListener("click", function(){
        // TOGGLE property to open/close the section contact
        contact.classList.toggle ('contact_open');
        // CONTACT HOST BUTTON setting arrows
        if (contact.classList.contains('contact_open')) {
            // setup btn text for closing action
            var strHtml = "<i class='fas fa-angle-double-up'></i><span> CONTATTA L'HOST</span>";
            btnContactHost.innerHTML = strHtml;
        } else {
            // setup btn text for open action
            var strHtml = "<i class='fas fa-angle-double-down'></i><span> CONTATTA L'HOST</span>";
            btnContactHost.innerHTML = strHtml;

            // Delete all inputs and labels values/strings
            contactFormDeleteLabelsInputs();
        }
        inputs.classList.toggle('wrap_inputs_visible')
    });


    var inputTextMessageElement = document.getElementById("text_message");

    inputTextMessageElement.addEventListener("keyup", function(){
        var charInputed = inputTextMessageElement.value.length;
        document.getElementById("text_message_label").innerText = charInputed + "/500";
    });




    // SEND MESSAGE BTN - #btn_send click event
    var btnSend = document.getElementById("btn_send"); 
    btnSend.addEventListener("click", function(){
        // Variables for Tag selector
        var accomodationId = document.getElementById("accomodation_id").value;
        var inputEmail = document.getElementById("email").value;
        var inputNickname = document.getElementById("nickname").value;
        var inputTextMessage = document.getElementById("text_message").value;

        // VALIDATION errors flag
        var inputErrors = false;

        // RESET all labels errors
        var arrayLabels = document.getElementsByClassName("label");
        for (let index = 0; index < arrayLabels.length; index++) {
            arrayLabels[index].innerHTML = "";
        }

        // MESSAGE TEXT input validation
        if (inputTextMessage.length == 0) {
            document.getElementById("text_message_label").innerText = "testo messaggio richiesto";
            inputErrors = true;
        }

        // EMAIL input validation
        if (inputEmail.length == 0) {
            document.getElementById("email_label").innerText = "email richiesta";
            inputErrors = true;
        } else if(ValidateEmail(inputEmail) == false) {
            document.getElementById("email_label").innerText = "formato email non valido";
            inputErrors = true;
        }

        // NIKCNAME input validation
        if (inputNickname.length == 0) {
            document.getElementById("nickname_label").innerText = "nickname richiesto";
            inputErrors = true;
        } else if (inputNickname.length < 3) {
            document.getElementById("nickname_label").innerText = "richiesti min. 3 caratteri per il nickname";
            inputErrors = true;
        }

        // ERRORS CONTROL
        if (inputErrors) {
            return;
        }

        // DELETE all inputs and labels values/strings
        contactFormDeleteLabelsInputs();

        // CLOSE the inputs message form to contact Host
        $('#sec_contact').removeClass("contact_open");
        $('#inputs').removeClass("wrap_inputs_visible");

        // AJAX CALL
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
                // TOAST MESSAGE show
                $('#toast_msg').addClass("toast_on");
                // TOAST MESSAGE set title
                $('#toast_title').text("Messaggio inviato!")
                // TOAST MESSAGE set text
                $('#toast_text').text("L'host potrà risponderti direttamente all'email indicata.")
                // TOAST MESSAGE hide
                setTimeout(function(){
                    $('#toast_msg').removeClass("toast_on");
                }, 5000);
            },
            "error" : function (error) {
                // alert("ERROR: " + error.status + " - " + error.statusText + '\n' + error.responseJSON.result);
                // TOAST MESSAGE appears
                $('#toast_msg').addClass("toast_on");
                // TOAST MESSAGE set title
                $('#toast_title').text("Errore invio")
                // TOAST MESSAGE set text
                $('#toast_text').text("Non è stato possibile inviare il messaggio, riprova.")
                // TOAST MESSAGE panel closing
                setTimeout(function(){
                    $('#toast_msg').removeClass("toast_on");
                }, 5000);
            }
        });
    });

})
// end "document ready function"


// function: sets gallery main image height based on a percentage of its width 
function setImgtopviewsHeight() {
    var newHeight = parseInt($(".img_topviews").css("width")) * 0.7;
    console.log("height: " + newHeight);
    $(".img_topviews").css("height", newHeight);
}

// function: sets thumbnail image height based on a percentage of its width 
function setThumbanilTopviewsHeight() {
    var newHeight = parseInt($(".thumbnail").css("width")) * 0.7;
    console.log("height: " + newHeight);
    $(".thumbnail").css("height", newHeight);
}

// function: checks if the email format is correct
function ValidateEmail(mail) 
{
    
 if (/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(mail))
  {
    return (true)
  }
    return (false)
};

// function: delete labels and inputs values in the contact form
function contactFormDeleteLabelsInputs() {
                // Delete all input values
                var arrayInputs = document.getElementsByClassName("form_input");
                for (let index = 0; index < arrayInputs.length; index++) {
                    console.log(arrayInputs[index].value);
                    arrayInputs[index].value = "";
                }   
                // Delete all labels strings
                var arrayLabels = document.getElementsByClassName("label");
                for (let index = 0; index < arrayLabels.length; index++) {
                    arrayLabels[index].innerHTML = "";
                }  
};

