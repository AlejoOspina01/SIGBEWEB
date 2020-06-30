<?php 

include_once './Daos/BecaDao.php';

class BecaControl{
	private $becaDao;

	public function __construct() {
		 $this->becaDao = new BecaDao();
	}

	public function buscarPorCodigo($codeid){
		return $this->becaDao->buscarPorCodigo($codeid);
	}

	public function buscarBecas(){
		return $this->becaDao->buscarBecas();
	}

	
}



 ?>