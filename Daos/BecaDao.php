<?php 

include_once './persistencia/conexion.php';


class BecaDao extends db{

	public function buscarPorCodigo($codeid){
		$becabuscada = $this->connect()->prepare('SELECT * FROM BECAS where idBeca = :idbeca');
		$becabuscada->execute(['idbeca' => $codeid]);

		return $becabuscada;
	}
	public function buscarBecas(){
		$becaNombre =$this->connect()->query( "SELECT * from becas");
		return $becaNombre;
	}  
}


?>