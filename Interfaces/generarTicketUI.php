<!DOCTYPE html>
<html>
<head>
        <title>Bienvenido <?php 
        $cadena = $user->getNombre() . " " .  $user->getApellido();
        $cadena_devuelta = strtoupper($cadena);
       echo $cadena_devuelta; ?></title>
    <script src="./resources/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./resources/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="./resources/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="./resources/css/bootstrap.css">
    <script type="text/javascript" src="./resources/js/bootstrap.js"></script>
    <link  rel="icon"   href="./resources/Images/Univalle.svg" type="image/png" />
</head>
<body>

	<nav class="navbar navbar-static-top example6">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand text-hide" href="./">Brand Text
				</a>
			</div>
			<div id="navbar6" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle dropddowncerrar" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $user->getNombre() . " " .  $user->getApellido(); ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a  href="clases/logout.php">Cerrar session</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->
	</nav>

	<div class="fondoUniversidad">

		<div class="menu mVisualizacion">

			<div>
				<form method="POST">
					<button name="mpostulaciones" class="button1">Mis postulaciones</button> 
					<button name="registerpostu" class="button1">Registrar Postulacion</button> 
					<button name="ticketAlmuerzo" class="button1">Comprar Ticket Almuerzo</button>
				</form>
			</div>


		</div>

		<div class="ticketDiv">


			<h2 class="login-header TituloVisualizar">Generar ticket almuerzo</h2>

			<div class="formularioGenerar">
				<form method="POST">
					<?php if (isset($ticketGeneradoExitvar)){
						echo "<p class='mensajeExitosoPost'>" . $ticketGeneradoExitvar . "</p>";
					}else if(isset($ticketGeneradoErrorvar)){
						echo "<p class='mensajeErrorPost'>" . $ticketGeneradoErrorvar . "</p>";
					} ?>

					<p><label>Mi saldo</label></p><p><input type="text" value="<?php echo $user->getSaldo(); ?>" disabled></p>
					<p><label>Identificacion</label></p><p><input type="text" value="<?php echo $user->getIdentifacion(); ?>" disabled></p>
					<p><label>Codigoestudiante</label></p><p><input type="text" value="<?php echo $user->getCodigoEst(); ?>" disabled></p>
					<p><label>Nombre estudiante</label></p><input type="text" value="<?php echo $user->getNombre() . " " . $user->getApellido(); ?>" disabled></p>
					<p><label>Fecha Compra del ticket</label></p><input type="text" value="<?php echo date('Y-m-d'); ?>" disabled></p>
					<p><button target="_blank" name="registroticketgenerar" class="botonGenerar">Generar ticket</button></p>
				</form>
			</div>




		</div>



	</div>


</body>
</html>

