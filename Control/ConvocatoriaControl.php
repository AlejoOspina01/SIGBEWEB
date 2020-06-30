<?php 

include_once './Daos/ConvocatoriaDao.php';

class ConvocatoriaControl{
	private $convoDao;

	public function __construct() {
		 $this->convoDao = new ConvocatoriaDao();
	}	
		public function buscarConvoBecaPeriodo($idbeca, $idperiodo){
			return $this->convoDao->buscarConvoBecaPeriodo($idbeca, $idperiodo);
		}

		public function registrarConvocatoria($convocatoriaCrear){
			return $this->convoDao->registrarConvocatoria($convocatoriaCrear);
		}

		public function buscarConvoPorConsecutivo($codigo){
			return $this->convoDao->buscarConvoPorConsecutivo($codigo);
		}

		public function actualizarCuposConvo($idconvo){
			return $this->convoDao->actualizarCuposConvo($idconvo);
		}	

		public function buscarEstados(){
			return $this->convoDao->buscarEstados();
		}

		public function buscarConvocatorias(){
			return $this->convoDao->buscarConvocatorias();
		}
	
}

 ?>