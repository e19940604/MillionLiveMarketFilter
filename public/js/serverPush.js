var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$(document).ready( function(){
    if( getUrlParameter('page') === '1' || getUrlParameter('page') === undefined ){
        var data = "";
        if( window.location.search === "" ){
            data = "?firstId=" +  $("#firstId").val() + "&name=&type=0&idol=0&cost=0&skillPower=0&line=0&candyOrDrink=0";
        } else {
            data = window.location.search
        }
        console.log(data);

        var evtSource = new EventSource("api/marketList" +data);

        window.beforeunload = function(){
            evtSource.close();
        };
        evtSource.onmessage = function(e) {
            console.log( e.data );
            evtSource.close();
        };
    }
} );