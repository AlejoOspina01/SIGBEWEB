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
						<a href="#" class="dropdown-toggle dropddowncerrar" data-toggle="dropdown" role="button" aria-expanded="false">Bienestar: <?php echo $user->getNombre() . " " .  $user->getApellido(); ?> <span class="caret"></span></a>
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

		<div class="menu">

			<div>
				<form method="POST">
					<button class="button1" name="mostrarConvo">Convocatorias</button> 
					<button class="button1" name="registroConvo" >Registrar Convocatoria</button> 
					<button class="button1" name="registroSaldo">Registrar Saldo</button> 
					<button class="button1" name="visualizarTickets">Visualizar los tickets de almuerzo</button>      
				</form>

			</div>


		</div>

		<div class="registroConvocatoria efectoentradaMenu" id="formularioConvocatoria">
			<h1 class="login-header">Registrar Convocatoria</h1>
			<?php if (isset($registroConvoerrvar)){
				echo "<p class='mensajeErrorPost'>" . $registroConvoerrvar . "</p>";
			}else if(isset($registroConvoexivar)){
				echo "<p class='mensajeExitosoPost'>" . $registroConvoexivar . "</p>";
			} ?>
			<form  method="POST" class="formConvocatoria" >				
				<div class="form-group">
					<label for="exampleFormControlInput1">Fecha de inicio de la convocatoria</label>
					<input type="date" class="form-control" id="exampleFormControlInput1" name="fechaInicio" required>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">Fecha de final de la convocatoria</label>
					<input type="date" class="form-control" id="exampleFormControlInput1" name="fechaFinal" required>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Becas</label>
					<select class="form-control" id="exampleFormControlSelect1" name="beca" required>
						<option>
							<?php
							include_once './Control/BecaControl.php';
							$beca = new BecaControl();
							$listBeca = $beca->buscarBecas();
							while ($row = $listBeca->fetch()) {
								echo '<option value="'.$row['idBeca'].'">'.$row['descripcion'].'</option>';
							}
							?>
						</option>

					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Periodo academico</label>
					<select class="form-control" id="exampleFormControlSelect1" name="periodo" required>
						<option>
							<?php
							include_once './Control/PeriodoControl.php';
							$periodo = new PeriodoControl();
							$listPeriodo = $periodo->periodoActual();
							while ($row = $listPeriodo->fetch()) {
								echo '<option value="'.$row['idperiodo_academicos'].'">'.$row['fecha_inicio'].' - '.$row['fecha_final'].'</option>';
							}
							?>
						</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Estado de la convocatoria</label>
					<select class="form-control" id="exampleFormControlSelect1" name="estado" required>
						<option value="1">Habilitado</option>
						<option value="2">Inhabilitado</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">Cupos para la convocatoria</label>
					<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Cupos habilitados" name="cupos" required>
				</div>
				<button type="submit" class="btn btn-primary mb-2" name="registroConvocatoria">Registrar Convocatoria</button>
			</form>
		</div>
	</div>
</div>


</body>
</html>



