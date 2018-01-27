<?php
session_start();

		if ($_POST['colonia'] && $_POST['_token'] == $_SESSION['token'] && $_POST["g-recaptcha-response"]) {
			$recaptcha = $_POST["g-recaptcha-response"];
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$datos = array(
				'secret' => 'TU API SECRET',
				'response' => $recaptcha
			);
			$opciones = array(
				'http' => array (
					'method' => 'POST',
					'content' => http_build_query($datos)
				)
			);
			$contexto  = stream_context_create($opciones);
			$verificar = file_get_contents($url, false, $contexto);
			$captcha_correcto = json_decode($verificar);
			 if ($captcha_correcto->success) {
			 	$col = $_POST['colonia'];
		  		$colonia = preg_replace('/[^a-zA-Z0-9_ -]/s','',$col);
		  		$con = new mysqli("TU HOST", "USUARIO DE DB", "PASSWORD DE DB", "BASE DE DATOS");
		  		$con->set_charset("utf8");
 ?>
 <!doctype html>
<html lang="es-MX">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
        <section class="mt-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
              	<h3>Resultados para la colonia <strong><?php echo $_POST['colonia']; ?></strong></h3>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Colonia</th>
                      <th scope="col">Municipio</th>
                      <th scope="col">Estado</th>
                      <th scope="col">Codigo postal</th>
                    </tr>
                  </thead>
                  <tbody>
                    	<?php if ($resultado = $con->query("SELECT * FROM postal WHERE colonia LIKE '%".$colonia."%' ")): ?>
		  				<?php while ($row=mysqli_fetch_assoc($resultado)): ?>
		  					<?php echo "<tr><td>".$row['colonia']."</td>
                      					<td>".$row['municipio']."</td>
                      					<td>".$row['estado']."</td>
                      					<td>".$row['codigo']."</td></tr>"; ?>
		  				<?php endwhile ?>
		  				<?php endif ?>
                  </tbody>
                </table>
                <a class="btn btn-primary btn-lg btn-block mt-5" href="index.php">Nueva Busqueda</a>
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
<?php 
	}else { header("location: index.php");}
 }else { header("location: index.php");} ?>