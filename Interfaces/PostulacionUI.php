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

    <script type="text/javascript">
        function ShowSelected()
        {
            /* Para obtener el texto */
            var combo = document.getElementById("convocatoriaselect");
            var selected = combo.options[combo.selectedIndex].text;

            if(selected != "Seleccione unoa"){
                document.getElementById("formularioregistrar").classList.add("mostrar");
            }
        }
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

    <div class="formularioDiv efectoentradaMenu">


        <h2 class="login-header TituloVisualizar">Realizar una postulacíon</h2>

        <div>

            <div class="formularioPostularRegister" >
                <?php if (isset($errorPostRegis)){
                    echo "<p class='mensajeErrorPost'>" . $errorPostRegis . "</p>";
                }else if(isset($exitosoPostRegis)){
                    echo "<p class='mensajeExitosoPost'>" . $exitosoPostRegis . "</p>";
                } ?>
                <form enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="convocatoriaselect">Selecciona una Convocatoria</label>
                        <select class="form-control" name="idConvocatoria" id="convocatoriaselect" onchange="ShowSelected()">
                            <option value="0">Seleccione uno</option>
                            <?php 
                            include_once './Control/BecaControl.php';
                            include_once './Control/ConvocatoriaControl.php';
                            $convoControl = new ConvocatoriaControl();
                            $becaControl = new BecaControl();
                            $listaConvo = $convoControl->buscarConvocatorias();


                            while($rows = $listaConvo->fetch()){
                                $becaEncontrada = $becaControl->buscarPorCodigo($rows['idBeca']);
                                $filas = $becaEncontrada->fetch();
                                echo '<option value="'. $rows['idConvocatorias'].'">'.$filas['descripcion'].'</option>';
                            }

                            ?>

                        </select>
                    </div>  
                    <div class="claseOcultar" id="formularioregistrar">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nombre y apellido del estudiante</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $user->getNombre() . ' ' . $user->getApellido(); ?>" disabled>

                            <label for="exampleFormControlInput1">Codigo de estudiante del estudiante</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $user->getCodigoEst(); ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Correo electronico</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $user->getCorreo(); ?>" disabled>
                            <label for="exampleFormControlInput1">Promedio acumulado</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="promedioacumulado">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger mb-2" name="registropostulacion">Registrar Postulacion</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>



    </div>

</div>
</div>
</div>




</div>



</div>


</body>
</html>

