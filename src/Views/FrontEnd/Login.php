<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
</head>

<body>
  <center>
    <br>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <form action="<?php echo $_ENV['BASE_URL']; ?>/api/login" method="POST" id="login_form" name="login_form">
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
              </tr>


            </table>
          </form>
        </div>
      </div>
    </div>
    <div id='dati'></div>
    <script>

      $('#login_form').submit(function () {
        $.ajax({
          url: $('#login_form').attr('action'),
          type: 'POST',
          dataType: "json",

          data: $('#login_form').serialize(),
          success: function (response) {
            console.log(response);
            js_listaUtenti(response.token);
          }
        });
        return false;
      });

      function js_listaUtenti(token) {

        $.ajax({
          url: '/classi/api/utenti',
          type: 'GET',
          dataType: "json",
          beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + token);
          },
          data: {},
          success: function (response) {

            console.log(response);
            response.forEach(function (value) {

              $("#dati").append(value.username + "<br>")

            }
            )

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