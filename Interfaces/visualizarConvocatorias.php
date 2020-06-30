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


    <h2 class="login-header TituloVisualizar">Visualizar las Convocatorias</h2>
    <?php if (isset($exitoAprobacion)){
        echo "<p class='mensajeExitosoPost'>" . $exitoAprobacion . "</p>";
    }else if(isset($errorAprobacion)){
        echo "<p class='mensajeErrorPost'>" . $errorAprobacion . "</p>";
    } ?>

    <div class="">
      <div class="">
        <div class="col-xs-12">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">

              <thead>
                <tr>
                    <th>Fecha Inicio</th>
                    <th>Fecha FIn</th>
                    <th>Estado Convocatoria</th>
                    <th>Beca</th>
                    <th>Periodo</th>
                    <th>Cupos</th>
                    <th>Postulaciones</th>

                </tr>
            </thead>
            <tbody>
             <?php 
             include_once './Control/ConvocatoriaControl.php';
             include_once './Control/PeriodoControl.php';
             $convoControl = new ConvocatoriaControl();
             $periodoControl = new PeriodoControl();
             $listaConvocatoria = $convoControl->buscarConvocatorias();
             while($row = $listaConvocatoria->fetch()){
                $periodoBuscado = $periodoControl->buscarPeriodoPorId($row['estado_convocatoria']);
                $listPeriodo = $periodoBuscado->fetch();
                echo "<tr>";
                echo "<td>" . $row['fechahora_inicio'] . "</td>";
                echo "<td>" . $row['fechahora_final'] . "</td>";
                if($row['estado_convocatoria'] == 1){
                  echo "<td> Abierta</td>";  
              }else if($row['estado_convocatoria'] == 2){
                echo "<td> Cerrada</td>"; 
            }
            if($row['idBeca'] == 1){
              echo "<td> Beca Almuerzo</td>";  
          }else if($row['idBeca'] == 2){
            echo "<td> Beca Refrigerio</td>"; 
        }
        echo "<td>" . date('Y' , strtotime($listPeriodo['fecha_inicio'])) . '-' . date('M' , strtotime($listPeriodo['fecha_inicio'])) . ' / ' . date('Y' , strtotime($listPeriodo['fecha_final'])) . '-' . date('M' , strtotime($listPeriodo['fecha_final'])) . "</td>";
        echo "<td>" . $row['cupos'] . "</td>";
        echo "<td> <form method='POST'>
        <input type='hidden' name='idConvocatoriainput' value=". $row['idConvocatorias'] . "><button class='butonLupita' name='ventanaPostuConvo'><img width='20px' height='20px' src='./resources/Images/magnifier.svg'/></button></form></td>";
        
        

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

