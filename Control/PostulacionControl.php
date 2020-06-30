<?php 

include_once './Daos/PostulacionDao.php';
include_once './Daos/ConvocatoriaDao.php';

class PostulacionControl{

	private $postDao;
	private $convDao;

	public function __construct() {
		 $this->postDao = new PostulacionDao();
		 $this->convDao = new ConvocatoriaDao();
	}
	
	public function buscarPostulacionPorIdentiConvo($identi, $convo){
		return $this->postDao->buscarPostulacionPorIdentiConvo($identi,$convo);
	}

	public function buscarPostulacionesPorIdConvo($idConvo){
		return $this->postDao->buscarPostulacionesPorIdConvo($idConvo);
	}

	public function buscarPostulacionesporIdenti($identi){
		return $this->postDao->buscarPostulacionesporIdenti($identi);
	}

	public function registrarPostulacion($postulacion){
		return $this->postDao->agregarPostulacion($postulacion);
	}

	public function actualizarEstadoPostulacion($idpost, $idestapost, $estadoactual, $idconvocatoria,$cuposactuales){
		//if()$conControl->actualizarCuposConvo($_POST['idconvocatoriaPost'])
		if($estadoactual == 2){
			if($idestapost == 1){
				if($this->postDao->actualizarEstadoPostulacion($idpost, $idestapost)){
					$cuposactualizacion = $cuposactuales - 1;
					if($this->convDao->actualizarCuposConvo($idconvocatoria,$cuposactualizacion)){
						return true;
					}else{
						return false;
					}
				}else{	
					return false;
				}
			}else {
				if($this->postDao->actualizarEstadoPostulacion($idpost, $idestapost)){
					return true;
				}else{
					return false;
				}
			}
		}else if($estadoactual == 1){
			if($idestapost == 1){
				return false;
			}else{
				if($this->postDao->actualizarEstadoPostulacion($idpost, $idestapost)){
					$cuposactualizacion = $cuposactuales + 1;
					if($this->convDao->actualizarCuposConvo($idconvocatoria,$cuposactualizacion)){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}	
			}
		}else{
			if($idestapost == 1){
				if($this->postDao->actualizarEstadoPostulacion($idpost, $idestapost)){
					$cuposactualizacion = $cuposactuales - 1;
					if($this->convDao->actualizarCuposConvo($idconvocatoria,$cuposactualizacion)){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}	
			}else{
				return false;
			}
				
		}



	}

}


 ?>