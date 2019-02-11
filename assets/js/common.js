$(document).ready(function() {

    function getXMLHttprequest() {
        if (window.XMLHttpRequest) {
            return new XMLHttpRequest();
        }

        return new ActiveXObject('Microsoft.XMLHTTP');
    }

    request = getXMLHttprequest();

    request.onreadystatechange = function() {
        if(request.readyState == 4) {
           var responseBody = request.responseText;
           var data = JSON.parse(responseBody);
           console.log(data);
           alert(data['message']);
        }
    }

    request.open('GET', '/ajaxtest.php', true);
    request.send('null');

});