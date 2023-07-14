<!DOCTYPE html>
<html lang="en">

<head>
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
<div class="card" >
  <div class="card-body">
    <form action="<?php echo $_ENV['BASE_URL']; ?>/filtra" method="POST" id="vai" name="vai">
        <table class="table table-responsive">
           
            <tr>
                <td>Username:</td>
                <td><input class="form-control" type="text" id='username' name='username' value=''></td>
            </tr>
            
                <td colspan="2" align="center">
                    <input class="btn btn-success" type="submit" value="vai" style="width:200px;">
                    </td>
            </tr>
            
            
                
        </table>
    </form>
</div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>