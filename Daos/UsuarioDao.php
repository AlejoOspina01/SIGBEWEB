<?php 

include_once './Persistencia/conexion.php';

class UsuarioDao extends db {

	public function usuarioExistente($email, $password){
		$query =$this->connect()->prepare('SELECT * FROM usuarios WHERE corrreo = :email AND contrasena = :password');
		$query->execute(['email' => $email, 'password' => $password]);		

		if($query->rowCount()){
			return true;
		}else{
			return false;
		}

	}

	public function crearUsuario($usuarioCrear){
		$query = $this->connect()->prepare('INSERT INTO usuarios (identificacion,nombre, apellido,corrreo,codigoestudiante,contrasena,saldo,idRol) VALUES(:identificacion, :nombre, :apellido, :corrreo, :codigoestudiante, :contrasena, :saldo, :idRol)');

		try{
			$query->execute(['identificacion' => $usuarioCrear->getIdentifacion(),
				'nombre' => $usuarioCrear->getNombre(),
				'apellido' => $usuarioCrear->getApellido(),
				'corrreo' => $usuarioCrear->getCorreo(),
				'codigoestudiante' => $usuarioCrear->getCodigoEst(),
				'contrasena' => $usuarioCrear->getContrasena(),
				'saldo' => $usuarioCrear->getSaldo(),
				'idRol' => $usuarioCrear->getIdRol()]);
			return true;
		}catch(PDOException $e){
			return false;
		}
	}

	public function buscarPorEmail($email){
		$query = $this->connect()->prepare('SELECT * FROM usuarios WHERE corrreo = :email');
		$query->execute(['email' => $email]);
		$busquedaEmail = $query->fetch();
		if($busquedaEmail){
			return true;
		}else{
			return false;
		}

	}

	public function setUserLogin($email){
		$query = $this->connect()->prepare('SELECT * FROM usuarios WHERE corrreo = :email');
		$query->execute(['email' => $email]);
		foreach ($query as $currentUser) {
			$this->identificacion = $currentUser['identificacion'];
			$this->nombre = $currentUser['nombre'];
			$this->apellido = $currentUser['apellido'];
			$this->codigoestudiante = $currentUser['codigoestudiante'];
			$this->correo = $currentUser['corrreo'];
			$this->contrasena = $currentUser['contrasena'];
			$this->saldo = $currentUser['saldo'];
			$this->idRol = $currentUser['idRol'];
		}
	}


	public function buscarEstudiantePorCodigo($codigoest){
		$query = $this->connect()->prepare('SELECT * FROM usuarios WHERE codigoestudiante = :codigoestudiante');
		$query->execute(['codigoestudiante' => $codigoest]);
		return $query;
	}

	public function buscarEstudiantePorIdentificacion($identi){
		$query = $this->connect()->prepare('SELECT * FROM usuarios WHERE identificacion = :identificacion');
		$query->execute(['identificacion' => $identi]);
		return $query;
	}
	
	public function actualizarSaldoUsuario($codigoest,$saldo){
		$query = $this->connect()->prepare('UPDATE usuarios SET saldo=saldo+:saldo WHERE codigoestudiante = :codigoestudiante');
		if($query->execute(['codigoestudiante' => $codigoest,'saldo'=> $saldo])){
			return true;

		}else{
			return false;
		}
	}

	public function actualizarSaldoTicketUser($codigoest,$saldo){
		$query = $this->connect()->prepare('UPDATE usuarios SET saldo=:saldo WHERE codigoestudiante = :codigoestudiante');
		if($query->execute(['codigoestudiante' => $codigoest,'saldo'=> $saldo])){
			return true;
		}else{
			return false;
		}
	}

	public function buscarUsuarios(){
		$usuariosBuscados = $this->connect()->query("SELECT * FROM usuarios");

		return $usuariosBuscados;

	}
}
	?>