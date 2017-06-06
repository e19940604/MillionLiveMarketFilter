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
        //console.log(data);

        var evtSource = new EventSource("api/marketList" +data);



        window.beforeunload = function(){
            evtSource.close();
        };

        evtSource.onmessage = function(e) {
            var updateData = JSON.parse( e.data );
            var tableBody = $('#tbody');
            tableBody.empty();

            //console.log( updateData );
            for( var key in updateData ){
                //console.log( key );
                tableBody.append(
                    '<div class="row tr">' +
                        '<div class="td col-sm-2"><p class="text">' +  updateData[key].name  +'</p></div>' +
                        '<div class="td col-sm-1"><p class="text">' +  updateData[key].cost  +'</p></div>' +
                        '<div class="td col-sm-2"><p class="text">' +  updateData[key].skill +'</p></div>' +
                        '<div class="td col-sm-3"><p class="text">' +  updateData[key].price +' </p></div>' +
                        '<div class="td col-sm-1"><p class="text"><a href="' + updateData[key].transactionUrl + '" onClick="ga(\'send\', \'event\', \'bazaar\', \'checkPage\', \'click\')" >バザー</a></p></div>' +
                        '<div class="td col-sm-2"><p class="text">' + updateData[key].postDate +'</p></div>' +
                        '<div class="td col-sm-1"><p class="text">' + updateData[key].line + '</p></div>' +
                    '</div>'
                );
            }
        };
    }
} );


