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

    <script>
        function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
    } else {
        tr[i].style.display = "none";
    }
}
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
            <button class="button1" name="mostrarConvo">Convocatorias</button> 
            <button class="button1" name="registroConvo" >Registrar Convocatoria</button> 
            <button class="button1" name="registroSaldo">Registrar Saldo</button> 
            <button class="button1" name="visualizarTickets">Visualizar los tickets de almuerzo</button>   
        </form>
    </div>
    

</div>

<div class="formularioDiv efectoentradaMenu">


    <h2 class="login-header TituloVisualizar">Visualizar los tickets</h2>
    <?php if (isset($exitoAprobacion)){
        echo "<p class='mensajeErrorPost'>" . $exitoAprobacion . "</p>";
    }else if(isset($errorAprobacion)){
        echo "<p class='mensajeExitosoPost'>" . $errorAprobacion . "</p>";
    } ?>

    <div class="">
      <div class="">
        <div class="col-xs-12">
          <div class="table-responsive">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="exampleFormControlInput1">Filtro por identificacion</label>
                    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Buscar por identificacion..">
                </div>
            </div>
            <table class="table table-bordered table-hover" id="myTable">

                <thead>
                    <tr>
                        <th>Fecha Compra del ticket</th>
                        <th>Identificacion</th>
                        <th>Codigo estudiante</th>
                        <th>Nombre</th>
                        <th>Apellido</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include_once './Daos/TicketDao.php';
                    include_once './Daos/UsuarioDao.php';
                    $tickets = new TicketDao();
                    $usu = new UsuarioDao();
                    $listaTickets = $tickets->buscarTickets();
                    while($row = $listaTickets->fetch()){
                        $estudianteBuscado = $usu->buscarEstudiantePorIdentificacion($row['identificacion']);
                        $listEstudiante = $estudianteBuscado->fetch();
                        echo "<tr>";
                        echo "<td>" . $row['fechacompra'] . "</td>";
                        echo "<td>" . $row['identificacion'] . "</td>"; 
                        echo "<td>" . $listEstudiante['codigoestudiante'] . "</td>";
                        echo "<td>" . $listEstudiante['nombre'] . "</td>";
                        echo "<td>" . $listEstudiante['apellido'] . "</td>";
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

