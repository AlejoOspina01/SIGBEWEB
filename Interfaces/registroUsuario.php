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
					<button class="button1" name="mostrarUsers">Ver Usuarios</button> 
					<button class="button1" name="registroUsers" >Registrar Usuario</button>
				</form>

			</div>


		</div>

		<div class="registroConvocatoria claseRegistroAdminUser efectoentradaMenu" id="formularioConvocatoria">
			<h2 class="login-header TituloVisualizar">Registrar un usuario</h2>
			<?php if (isset($registroErrsovar)){
				echo "<p class='mensajeErrorPost'>" . $registroErrsovar . "</p>";
			}else if(isset($registroExitosovar)){
				echo "<p class='mensajeExitosoPost'>" . $registroExitosovar . "</p>";
			} ?>
			<form  method="POST" class="formConvocatoria formUserAdmin" >
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="exampleFormControlInput1">Nombre </label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="nombre" required>
					</div>
					<div class="form-group col-md-6">
						<label for="exampleFormControlInput1">  Apellido </label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="apellido" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="exampleFormControlInput1">Contraseña</label>
						<input type="password" class="form-control" id="exampleFormControlInput1" name="contrasena" required>
					</div>
					<div class="form-group col-md-6">
						<label for="exampleFormControlInput1">Identificación</label>
						<input type="number" class="form-control" id="exampleFormControlInput1" name="identificacion" required>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="exampleFormControlInput1">Correo</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="correo" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="exampleFormControlInput1">Código Estudiante(si es necesario)</label>
						<input type="number" class="form-control" id="exampleFormControlInput1" name="codigoestudiante">
					</div>
					<div class="form-group col-md-6">
						<label for="exampleFormControlSelect1">Seleccione Rol</label>
						<select class="form-control" id="exampleFormControlSelect1" name="rol" required>
							<option>
								<?php
								include_once './Daos/RolDao.php';
								$RolDao = new RolDao();
								$listRol = $RolDao->buscarRoles();
								while ($row = $listRol->fetch()) {
									echo '<option value="'.$row['idRol'].'">'.$row['descripcion'].'</option>';
								}
								?>
							</option>

						</select>
					</div>
				</div>
				<button type="submit" class="btn btn-danger mb-2" name="registroUsuario">Registrar Usuario</button>
			</form>
		</div>
	</div>
</div>


</body>
</html>



