<!DOCTYPE html>
<head>
    <title>Affichage de données</title>
    <meta charset="utf-8">
    <script src="Chart.js"></script>
    <script src="URI.min.js"></script>
</head>
<body>

<?php
$request_headers        = apache_request_headers();
$http_origin            = $request_headers['Origin'];
$allowed_http_origins   = array(
                            "http://localhost:8080"  ,
                          );
if (in_array($http_origin, $allowed_http_origins)){
    @header("Access-Control-Allow-Origin: " . $http_origin);
}
?>

    <script>
        function getData(device){
            var url = new URI(document.location.href);
            var result = URI.parseQuery(document.location.search);
            url.addSearch("find");
            var jsonURL = "http://"+ document.location.host + ":8080/?" + url._parts.query + "&device=" + device ;
            var req = new XMLHttpRequest();
            req.open('GET', jsonURL, false);

            req.send();

            return req.responseText;

        }
        var test = getData("temperature");
        console.log(test);



    </script>
</body>
</html>
