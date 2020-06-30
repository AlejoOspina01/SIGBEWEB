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


</div>


</body>
</html>

