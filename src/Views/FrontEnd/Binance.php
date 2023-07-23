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
        <br>Binance
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo $_ENV['BASE_URL']; ?>/api/login" method="POST" id="login_form"
                        name="login_form">
                        <table class="table table-responsive">

                            <tr>
                                <td>Username:</td>
                                <td><input class="form-control" type="text" id='username' name='username' value=''></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input class="form-control" type="text" id='password' name='password' value=''></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input class="btn btn-success" type="submit" value="vai" style="width:200px;">
                                </td>
                        <!--<tr>
                                <td>Moneta:</td>
                                <td><input class="form-control" type="text" id='moneta' name='moneta' value=''></td>
                            </tr>
-->
                            <tr>
                                <td>Moneta:</td>
                                <td><select id='moneta' name='moneta'><option value=''>---Nessuna Scelta---</option></select></td>
                            </tr>
                            </tr>
                        </table>
                    </form>
                    <div id='prezzo'><input class="btn btn-success" type='button' value='Richiedi Valutazione Attuale'
                            onClick='binanceApi();'></div>
                    <br>
                    <div id='settimanale'><input class="btn btn-success" type='button'
                            value='Richiedi Prima Valutazione Oggi' onClick='binanceApi2();'></div>
                 
                    <div id='dati'></div>
                </div>
            </div>
        </div>
        <script>
            //alternativa al login nella pagina stessa
            //https://blog.teamtreehouse.com/storing-data-on-the-client-with-localstorage

            $('#login_form').submit(function () {

                $.ajax({
                    url: $('#login_form').attr('action'),
                    type: 'POST',
                    dataType: "json",

                    data: $('#login_form').serialize(),
                    success: function (response) {

                        //salvo il token nel browser. vedi conm f12
                        localStorage.setItem('token', response.token);

                        binanceSymbols()

                    }
                });

                return false;

            });

            function binanceSymbols() {

                //$cambio="EURUSDT";

                $.ajax({

                    url: "/classi/api/symbols",
                    type: 'GET',
                    dataType: "json",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('token'));
                    },
                    data: {},
                    success: function (response) {

                        var data = JSON.parse(response);
                        var symbols = data.symbols;
                       
                        $("#moneta").empty();
                        
                        $.each(symbols, function (index, symbols) {

                            var option = $("<option>").val(symbols.symbol).text(symbols.symbol);
                            $("#moneta").append(option);

                        });


                    },
                    error: function () { },
                });

            }


            function binanceApi() {

                //$cambio="EURUSDT";

                var moneta = $("#moneta").val();

                $.ajax({

                    url: "/classi/api/binance/" + moneta,
                    type: 'GET',
                    dataType: "json",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('token'));
                    },
                    data: {},
                    success: function (response) {

                        console.log(response);

                        $("#dati").html("Actual: " + response.price)


                    },
                    error: function () { },
                });

            }

            function binanceApi2() {

                //$cambio="EURUSDT";

                var moneta = $("#moneta").val();

                $.ajax({

                    url: "/classi/api/binance2/" + moneta,
                    type: 'GET',
                    dataType: "json",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('token'));
                    },
                    data: {},
                    success: function (response) {

                        console.log(response);

                        $("#dati").html("Apertura: " + response[0][1])


                    },
                    error: function () { },
                });

            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>

</body>

</html>