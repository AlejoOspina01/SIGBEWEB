<?php 

include_once './Persistencia/conexion.php';

class ConvocatoriaDao extends db{
	
	public function buscarConvocatorias(){
		$convocatoriasBuscadas = $this->connect()->query("SELECT * FROM convocatorias WHERE estado_convocatoria = '1'");
		return $convocatoriasBuscadas;

	}

	public function buscarConvoPorConsecutivo($codigo){
		$convocatoriaBuscadas = $this->connect()->prepare('SELECT * FROM convocatorias where idConvocatorias = :idConvocatorias');
		$convocatoriaBuscadas->execute(['idConvocatorias' => $codigo]);

		$postbusc = $convocatoriaBuscadas->fetch();

		if($postbusc){
			return $postbusc;
		}else{
			return false;
		}
	}

	public function buscarConvoBecaPeriodo($idbeca, $idperiodo){
		$convocatoriaBuscadas = $this->connect()->prepare('SELECT * FROM convocatorias where idBeca = :idBeca AND idperiodo_academicos = :idperiodo_academicos');
		$convocatoriaBuscadas->execute(['idBeca' => $idbeca, 'idperiodo_academicos' => $idperiodo]);

		$postbusc = $convocatoriaBuscadas->fetch();

		if($postbusc){
			return true;
		}else{
			return false;
		}
	}
	public function registrarConvocatoria($convocatoriaCrear){
		$query = $this->connect()->prepare('INSERT INTO convocatorias(fechahora_inicio, fechahora_final,estado_convocatoria,idBeca,idperiodo_academicos,cupos) VALUES(:fechahora_inicio, :fechahora_final, :estado_convocatoria,:idBeca, :idperiodo_academicos, :cupos)');


		if($query->execute(['fechahora_inicio' => $convocatoriaCrear->getfechahora_inicio(),
			'fechahora_final' => $convocatoriaCrear->getfechahora_final(),
			'estado_convocatoria' => $convocatoriaCrear->getestado_convocatoria(),
			'idBeca' => $convocatoriaCrear->getidBeca(),
			'idperiodo_academicos' => $convocatoriaCrear->getidperiodoAcademico(),			
			'cupos' => $convocatoriaCrear->getcupos()])){
			return true;
	}else{
		return false;
	}
}

	public function actualizarCuposConvo($idconvo,$cupos){
		$query = $this->connect()->prepare('UPDATE convocatorias SET cupos= :cupos WHERE idConvocatorias = :idConvocatorias');
		if($query->execute( ['cupos' => $cupos , 
							'idConvocatorias' => $idconvo])){
			return true;

		}else{
			return false;
		}
	}

}

?>