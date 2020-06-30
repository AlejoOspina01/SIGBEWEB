<?php 

include_once './Daos/PeriodoDao.php';

class PeriodoControl{

	private $periodoDao;

	public function __construct() {
		 $this->periodoDao = new PeriodoDao();
	}	

	public function periodoActual(){
		return $this->periodoDao->periodoActual();
	}

	public function buscarPeriodoPorId($idperiodoacademico){
		return $this->periodoDao->buscarPeriodoPorId($idperiodoacademico);
	}

}


 ?>