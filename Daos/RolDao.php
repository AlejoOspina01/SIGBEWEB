<?php 
include_once './Persistencia/conexion.php';
class RolDao extends db{
	public Function buscarRoles(){
		$query = $this->connect()->query('SELECT * FROM roles');
		return $query;
	}
}
	?>