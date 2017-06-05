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

// only on first page run server push event
if( getUrlParameter('page') === '1' || getUrlParameter('page') === undefined ){
    console.log("here");
    var evtSource = new EventSource("api/marketList/test/1");

    evtSource.onmessage = function(e) {
        console.log( e.data );
    };

    window.onbeforeunload = function(){
        evtSource.close();
    };
}