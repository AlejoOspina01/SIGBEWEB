<!DOCTYPE html>
<html>
<head>
    <title>SIGBE - Sistema para la gestion de becas</title>
    <script src="./resources/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./resources/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="./resources/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="./resources/css/bootstrap.css">
    <script type="text/javascript" src="./resources/js/bootstrap.js"></script>
    <link  rel="icon"   href="./resources/Images/Univalle.svg" type="image/png" />
</head>
<body>
	<!DOCTYPE html>	
	<html>

	<body>

		<script type="text/javascript">


			function iniciarFuncion(){
				document.getElementById("formularioregistrar").classList.add("mostrar");
				document.getElementById("iniciarsesion").classList.add("claseOcultar");

			};

			function registrarseFuncion(){
			};	

		</script>





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

					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</nav>

		<div class="fondoUniversidad">

			<div class="entrada" id="iniciarsesion">

				<div class="login">
					<div class="
					"></div>

					<h2 class="login-header">Iniciar sesion</h2>


					<form class="login-container" method="POST">
						<?php if (isset($errorLogin)){
							echo "<p class='mensajeErrorPost'>" . $errorLogin . "</p>";
						} else if (isset($registroExitosovar)){
							echo "<p class='mensajeExitosoPost'>" . $registroExitosovar . "</p>";
						}else if (isset($registroErrorvar)){
							echo "<p class='mensajeErrorPost'>" . $registroErrorvar . "</p>";
						} ?>
						<p><input type="email" placeholder="Email" name="email"></p>
						<p><input type="password" placeholder="Password" name="password"></p>
						<div class="divbotonesiniciarsesion">
							<p class="pinput">
								<input type="submit" name="iniciarsession" value="Iniciar sesion">
							</p>
							<p class="pinput">
								<a class="BotonRegistrarse" value="Registrarse" onclick="iniciarFuncion()">Registrarse</a>
							</p>	
						</div>
						
					</form>
				</div>

			</div>

			<div class="Registrarse claseOcultar" id="formularioregistrar">
				<div class="login">
					<div class="
					"></div>

					<h2 class="login-header">Registrarse</h2>

					<form class="login-container" method="POST">
						<p class=""><input type="number" placeholder="Identificacion" name="identificacion">
						</p>

						<p>
							<input class="nombreres" type="text" placeholder="nombre" name="nombre"/>
							<input class="apellidoes" type="text" placeholder="apellido" name="apellido"/>
						</p>
						<p class=""><input type="email" placeholder="correo" name="correo"></p>
						<p>
							<input class="nombreres" type="number" placeholder="Codigo estudiante" name="codigoestudiante"/>
							<input class="apellidoes" type="password" placeholder="Contraseña" name="contrasena"/>
						</p>
						<div class="divbotonesiniciarsesion">
							<p class="pinput">
								<input type="submit" name="registro" value="Registrase">
							</p>
							<p class="pinput">
								<input type="submit" value="Iniciar sesion" id="mostrarIniciar" onclick="registrarseFuncion()">
							</p>	
						</div>
						
					</form>
				</div>

			</div>

		</div>


	</body>
	</html>

</body>
</html>