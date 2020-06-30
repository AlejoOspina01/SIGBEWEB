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
         <button class="button1" name="mostrarUsers">Ver Usuarios</button> 
         <button class="button1" name="registroUsers" >Registrar Usuario</button>    
       </form>
     </div>
     

   </div>

   <div class="formularioDiv efectoentradaMenu">


    <h2 class="login-header TituloVisualizar">Visualizar las Convocatorias</h2>

    <div class="">
      <div class="">
        <div class="col-xs-12">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>Identificación</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Codigo Estudiante</th>
                  <th>Rol</th>
                </tr>
              </thead>
              <tbody>
               <?php 
               include_once './Daos/UsuarioDao.php';
               $Usuario = new UsuarioDao();
               $listaUsuario = $Usuario->buscarUsuarios();
               while($row = $listaUsuario->fetch()){
                //$periodoBuscado = $periodo->buscarPeriodoPorId($row['idestado_convocatoria']);
                //$listPeriodo = $periodoBuscado->fetch();
                echo "<tr>";
                echo "<td>" . $row['identificacion'] . "</td>";
                echo "<td>" . $row['nombre'] . " " . $row['apellido'] . "</td>";
                echo "<td>" . $row['corrreo'] . "</td>";
                echo "<td>" . $row['codigoestudiante'] . "</td>";
                if($row['idRol'] == 1){
                  echo "<td> Estudiante</td>";  
                }else if($row['idRol'] == 2){
                  echo "<td> Bienestar</td>"; 
                }else if ($row['idRol'] == 3){
                  echo "<td> Administrador</td>";
                }
                
      /*  echo "<td> <form method='POST'>
      <input type='hidden' name='idConvocatoriainput' value=". $row['idConvocatorias'] . "><button name='ventanaPostuConvo'>Lupita</button></form></td>";*/
      echo "</tr>";
    }

    ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="5" class="text-center">Información sacada de la base de datos creada por Alejandro y Gustavo</td>
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

