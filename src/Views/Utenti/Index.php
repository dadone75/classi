<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    
<div class="table-responsive">
  <table class="table">
  <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Password</th>
        <th>Link</th>
    </tr>

    <?php

    foreach($view_params["utenti"] as $riga){
    
    ?>
    <tr>
        <td><?php echo $riga["id"]; ?></td>
        <td><?php echo $riga["username"]; ?></td>
        <td><?php echo $riga["password"]; ?></td>
        <td><a href="./utenti/<?php echo $riga["id"]; ?>" class="card-link">Vedi Utente id</a></td>
        <td><a href="./utenti/<?php echo $riga["slug"]; ?>" class="card-link">Vedi Utente nome</a></td>
    </tr>
    
    <?php
    
    }

    ?>
    
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


</body>
</html>