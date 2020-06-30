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
                <button class="button1" name="mostrarConvo">Convocatorias</button> 
                <button class="button1" name="registroConvo" >Registrar Convocatoria</button> 
                <button class="button1" name="registroSaldo">Registrar Saldo</button> 
                <button class="button1" name="visualizarTickets">Visualizar los tickets de almuerzo</button>       
            </form>
        </div>
        

    </div>

    <div class="formularioDiv efectoentradaMenu">


        <h2 class="login-header TituloVisualizar">Visualizar las postulaciones de la Convocatoria</h2>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="exampleFormControlInput1">Consecutivo</label>
                <input type="text" class="form-control campoinputMostrarpost" id="exampleFormControlInput1" value="<?php echo $ConEncontrada['idConvocatorias']; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Fecha de inicio de la convocatoria</label>
                <input type="text" class="form-control campoinputMostrarpost" id="exampleFormControlInput1" value="<?php echo $ConEncontrada['fechahora_inicio']; ?>" disabled>
                <label for="exampleFormControlInput1">Fecha de fin de la convocatoria</label>
                <input type="text" class="form-control campoinputMostrarpost" id="exampleFormControlInput1" value="<?php echo $ConEncontrada['fechahora_final']; ?>" disabled>
            </div>
        </div>

        <div class="">
          <div class="">
            <div class="col-xs-12">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">

                  <thead>
                    <tr>
                        <th>Identificacion</th>
                        <th>Fecha Postulacion</th>
                        <th>Estado Postulacion</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                   <?php 
                   include_once './Control/PostulacionControl.php';

                   $postulacion = new PostulacionControl();

                   $listaPostulaciones = $postulacion->buscarPostulacionesPorIdConvo($conpust->getIdConvocatoria());
                   while($row = $listaPostulaciones->fetch()){
                    echo "<tr>";
                    echo "<td>" . $row['identificacion'] . "</td>";
                    echo "<td>" . $row['fechapostulacion'] . "</td>";
                    if($row['estado_postulacion'] == 2){
                      echo "<td > En espera</td>";  
                  }else if($row['estado_postulacion'] == 1){
                    echo "<td> Aprobado</td>"; 
                }else{
                    echo "<td> Rechazado</td>"; 
                }

                    echo "<td> <form method='POST'>
                    <input type='hidden' name='cuposactuales' value=". $ConEncontrada['cupos'] . ">
                    <input type='hidden' name='estadoactual' value=". $row['estado_postulacion'] . ">
                    <input type='hidden' name='idPostulacionInput' value=". $row['id_postulacion'] . ">
                    <input type='hidden' name='idconvocatoriaPost' value=". $row['idConvocatorias'] . ">
                    <input type='hidden' name='idestadopostulacionescogido' value='1'><button name='ventanaAprobarPostu'>Aprobado</button></form>
                    <form method='POST'>
                    <input type='hidden' name='cuposactuales' value=". $ConEncontrada['cupos'] . ">
                    <input type='hidden' name='estadoactual' value=". $row['estado_postulacion'] . ">
                    <input type='hidden' name='idPostulacionInput' value=". $row['id_postulacion'] . ">
                    <input type='hidden' name='idconvocatoriaPost' value=". $row['idConvocatorias'] . ">
                    <input type='hidden' name='idestadopostulacionescogido' value='3'><button name='ventanaAprobarPostu'>Rechazado</button></form></td>";
                
                



                echo "</tr>";
            }

            ?>
        </tbody>
        <tfoot>
            <tr>
              <td colspan="5" class="text-center">Información sacada de la base de datos creada por Alejandro , Gustavo y William</td>
          </tr>
      </tfoot>
  </table>
</div><!--end of .table-responsive-->
</div>
</div>
</div>




</div>



</div>


</body>
</html>

