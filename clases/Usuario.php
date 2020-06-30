<?php 

include_once './Persistencia/conexion.php';

class Usuario extends db{

	private $identificacion;
	private $nombre;
	private $apellido;
	private $codigoestudiante;
	private $correo;
	private $contrasena;
	private $saldo;
	private $idRol;


	public function getIdentifacion(){
		return $this->identificacion;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getApellido(){
		return $this->apellido;
	}
	public function getCodigoEst(){
		return $this->codigoestudiante;
	}
	public function getCorreo(){
		return $this->correo;
	}
	public function getContrasena(){
		return $this->contrasena;
	}
	public function getSaldo(){
		return $this->saldo;
	}
	public function getIdRol(){
		return $this->idRol;
	}


	//Establecer valores
	public function setIdentifacion($iden){
		$this->identificacion = $iden;
	}
	public function setNombre($nom){
		return $this->nombre = $nom;
	}
	public function setApellido($apell){
		return $this->apellido = $apell;
	}
	public function setCodigoEst($codigoest){
		return $this->codigoestudiante = $codigoest;
	}
	public function setCorreo($corre){
		return $this->correo = $corre;
	}
	public function setContrasena($contra){
		return $this->contrasena = $contra;
	}
	public function setSaldo($sald){
		return $this->saldo = $sald;
	}
	public function setIdRol($rol){
		return $this->idRol = $rol;
	}

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