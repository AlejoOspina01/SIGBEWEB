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

    <div class="formularioDiv efectoentradaMenu">


        <h2 class="login-header TituloVisualizar">Visualizar mis postulaciones</h2>

        <div class="">
          <div class="">
            <div class="col-xs-12">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">

                  <thead>
                    <tr>
                        <th>Codigo postulacion</th>
                        <th>Fecha Postulacion</th>
                        <th>Identificacion</th>
                        <th>Estado Postulacion</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include_once 'clases/Postulacion.php';
                    include_once './Control/PostulacionControl.php';
                    
                    $postControl = new PostulacionControl();
                    $listapostulacion = $postControl->buscarPostulacionesporIdenti($user->getIdentifacion());
                    while($row = $listapostulacion->fetch()){
                        echo "<tr>";
                        echo "<td>" . $row['id_postulacion'] . "</td>";
                        echo "<td>" . $row['fechapostulacion'] . "</td>";
                        echo "<td>" . $row['identificacion'] . "</td>";
                        if($row['estado_postulacion'] == 2){
                          echo "<td> En espera</td>";  
                      }else if($row['estado_postulacion'] == 3){
                        echo "<td> Rechazado</td>"; 
                    }else{
                        echo "<td> Aprobado</td>"; 
                    }

                    echo "</tr>";
                }

                ?>
            </tbody>
            <tfoot>
                <tr>
                  <td colspan="5" class="text-center">Información sacada de la base de datos creada por Alejandro, Gustavo y William</td>
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

