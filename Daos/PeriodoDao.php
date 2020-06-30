<?php 
include_once './Persistencia/conexion.php';
class PeriodoDao extends db{

	public function periodoActual(){
		$ultimoPeriodo =$this->connect()->query( "SELECT * from periodo_academicos order by idperiodo_academicos DESC limit 1");
		return $ultimoPeriodo;
	}  

	public function buscarPeriodoPorId($idperiodoacademico){
		$periodoID = $this->connect()->prepare('SELECT * FROM periodo_academicos where idperiodo_academicos = :idperiodo_academicos');
		$periodoID->execute(['idperiodo_academicos' => $idperiodoacademico]);

		return $periodoID;
	}

}

?>