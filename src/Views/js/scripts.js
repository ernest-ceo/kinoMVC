//here's gonna be script for AJAX


//from zadanie_oceniane_08
var form = document.querySelector("#form"),
    message = document.querySelector("#message");

function showMessage(type, msg) {

    message.className = type;
    message.innerHTML = msg;

}

function SwapMovie(option, action) {
    var data = {};
    //    	data["id_aktora"]=document.getElementById('aktor_movies').getAttribute['id_aktora'];
    data["id_aktora"] = document.getElementById('aktor_movies').dataset['id_aktora'];
    data["id_filmu"] = option.value;
    data["action"] = action;
    AJAX({
        type: "GET",
        url: "ajax/filmy_aktora.php",
        data: data,
        success: function(response, xhr) {
            var res = JSON.parse(response);
            if (Array.isArray(res)) {
                showMessage("error", res.join("<br>"));
            } else if ("error" in res) {
                showMessage("error", res.error);
            } else if ("success" in res) {
                document.getElementById('aktor_movies').innerHTML = res.success;
                //    				showMessage("success", res.success);
                //    				form.removeEventListener("submit", sendEmail, false);
                //    				form.querySelector("button").setAttribute("disabled", "disabled");
            }
        }
    });


};

// var el = document.getElementById("footer")
// alert(el.offsetHeight)

// alert(document.body.scrollHeight)
AdjustFooter();

function AdjustFooter() {

    var navbarTop = document.getElementById("mainNav")
    var navbarBottom = document.getElementById("footer")
    var bodyHeight = document.getElementsByTagName("body")[0];
    var availableScrollSpace = screen.height - navbarBottom.offsetHeight;
    // var availableScrollSpace = screen.height - navbarTop.offsetHeight - navbarBottom.offsetHeight;
    // alert(availableScrollSpace);
    // alert(bodyHeight.offsetHeight);

    // if (document.body.scrollHeight < screen.height) {
    if (availableScrollSpace > bodyHeight.offsetHeight) {

        positionElementFixed("footer");

    }

}

function positionElementFixed(id) {
    var el = document.getElementById(id);
    el.style.position = "fixed";
}

function minimumHeightWhenSmallHeightID(id) {
    var el = document.getElementById(id);
    el.style.minHeight = screen.height + 70 + "px";
}

function minimumHeightWhenSmallHeightClass(className) {
    var el = document.getElementsByClassName(className);
    el.style.minHeight = screen.height + 70 + "px";
}

function minimumHeightWhenSmallHeightTagName(tagName) {
    var el = document.getElementsByTagName(tagName);
    el.style.minHeight = screen.height + 70 + "px";
}

function reloadCss() {
    var links = document.getElementsByTagName("link");
    for (var cl in links) {
        var link = links[cl];
        if (link.rel === "stylesheet")
            link.href += "";
    }
}



// (function() {
//     "use strict";

//     // custom scrollbar

//     $("html").niceScroll({styler:"fb",cursorcolor:"#000", cursorwidth: '4', cursorborderradius: '10px', background: '#ccc', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});

//     $(".scrollbar1").niceScroll({styler:"fb",cursorcolor:"#000", cursorwidth: '4', cursorborderradius: '0',autohidemode: 'false', background: '#ccc', spacebarenabled:false, cursorborder: '0'});



//     $(".scrollbar1").getNiceScroll();
//     if ($('body').hasClass('scrollbar1-collapsed')) {
//         $(".scrollbar1").getNiceScroll().hide();
//     }

// })(jQuery);