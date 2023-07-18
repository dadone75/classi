<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
</head>

<body>
    <center>
        <br>Meteo
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div id='dati'></div>
                </div>
            </div>
        </div>
        <div id='dati'></div>
        <script>


$( document ).ready(function() {
            
            geo();
            //meteo();
            //meteoApi();
          

        })

            function meteo(lat,lon) {

                $.ajax({
                    url: "https://api.open-meteo.com/v1/forecast?latitude="+ lat + "&longitude="+ lon +"&current_weather=true&hourly=temperature_2m,relativehumidity_2m,windspeed_10m",
                    type: 'GET',
                    dataType: "json",

                    data: {},
                    success: function (response) {

                        console.log(response);

                        $("#dati").append("CORRETTO " + response.current_weather.temperature + "<br>")
                       // $("#dati").append(JSON.stringify(response))



                    },
                    error: function () { },
                });

            }

            function meteoApi(lat,lon) {

                $.ajax({
                    
                    url: "/classi/api/meteo/"+ parseFloat(lat) + "/" + parseFloat(lon),
                    type: 'GET',
                    dataType: "json",

                    data: {},
                    success: function (response) {

                        console.log(response);

                        $("#dati").append("API la rotta non prende i parametri " + response.temperature + "<br>")


                    },
                    error: function () { },
                });

            }

function geo(){

    if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
    
    
    meteoApi(latitude,longitude);
    meteo(latitude,longitude);
  });
} else {
  console.log("Geolocation is not supported by this browser.");
}

}
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>

</body>

</html>