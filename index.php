<?php
session_start();
$_SESSION["token"] = md5(uniqid(mt_rand(), true));
?>
<!doctype html>
<html lang="es-MX">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>CODIGOS POSTALES BY GABRIEL CHAVEZ</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="https://gabrielchavez.me/wp-content/uploads/2017/08/favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Codigos postales by Gabriel Chavez
          </a>
        </div>
      </nav>
    </header>
        <section>
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">¿Cómo funciona?</h1>
              <p class="lead">Sencillo, colocas el nombre de la colonia que quieres saber el código postal y en automático te mostraremos los datos completos.</p>
            </div>
          </div>
        </section>
        <section>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <form action="busqueda.php" method="POST" accept-charset="utf-8">
                  <input type="hidden" name="_token" value="<?php echo $_SESSION['token']; ?>">
                  <input class="form-control form-control-lg" name="colonia" type="text" placeholder="Nombre de la colonia">
                  <center><div class="g-recaptcha mt-3" data-sitekey="TU PUBLIC KEY GOOGLE RECAPTCHA"></div></center>
                  <button type="submit" class="btn btn-primary btn-lg btn-block mt-4"><i class="fa fa-search"></i> Buscar código postal</button>
                </form>
              </div>
            </div>
          </div>
        </section>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>