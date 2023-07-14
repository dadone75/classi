<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    
<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Utente <?php echo $view_params["utente"]["id"];?></h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Username <?php echo $view_params["utente"]["username"];?></h6>
    <p class="card-text"><?php echo $view_params["utente"]["password"];?></p>
    <a href="<?php echo $_ENV['BASE_URL']; ?>/utenti" class="card-link">Lista Utenti</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


</body>
</html>