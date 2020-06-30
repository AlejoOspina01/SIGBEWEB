<?php 

include_once './Persistencia/conexion.php';

class PostulacionDao extends db{


	public function buscarPostulacionesporIdenti($identi){
		$postulacionesBuscadas = $this->connect()->prepare('SELECT * FROM postulacion where identificacion = :identificacion');
		$postulacionesBuscadas->execute(['identificacion' => $identi]);

		return $postulacionesBuscadas;

	}

	public function buscarPostulacionesPorIdConvo($idConvo){
		$postulacionesBuscadas = $this->connect()->prepare('SELECT * FROM postulacion where idConvocatorias = :idConvocatorias');
		$postulacionesBuscadas->execute(['idConvocatorias' => $idConvo]);

		return $postulacionesBuscadas;
	}

	public function actualizarEstadoPostulacion($idpost, $idestapost){
		$query = $this->connect()->prepare('UPDATE postulacion SET estado_postulacion = :estado_postulacion WHERE id_postulacion = :id_postulacion');
		if($query->execute(['estado_postulacion' => $idestapost, 'id_postulacion' => $idpost])){
			return true;

		}else{
			return false;
		}

	}

	public function buscarPostulacionPorIdentiConvo($identi, $convo){
		$postulacionesBuscadas = $this->connect()->prepare('SELECT * FROM postulacion where idConvocatorias = :idConvocatorias AND identificacion = :identificacion');
		$postulacionesBuscadas->execute(['idConvocatorias' => $convo, 'identificacion' => $identi]);

		$postbusc = $postulacionesBuscadas->fetch();

		if($postbusc){
			return true;
		}else{
			return false;
		}

		return $postulacionesBuscadas;
	}

	public function agregarPostulacion($postulacion){
		$query = $this->connect()->prepare('INSERT INTO postulacion (identificacion, promedio, idConvocatorias, fechapostulacion,estado_postulacion) VALUES(:identificacion, :promedio ,  :idConvocatoria, :fechapostulacion, :estado_postulacion)');
		
		if($query->execute(['identificacion' => $postulacion->getidentfiicacion(),
			'promedio' => $postulacion->getpromedio(),
			'idConvocatoria' => $postulacion->getidconvocatoria(),
			'fechapostulacion' => $postulacion->getfechapostulacion(),
			'estado_postulacion' => $postulacion->getestadopostulacion()])){
			
			return true;

		}else{

			return false;
		}
  	}



}
?>
