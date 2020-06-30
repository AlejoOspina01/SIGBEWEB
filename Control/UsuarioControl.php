<?php 

include_once './Daos/UsuarioDao.php';

class UsuarioControl{
	private $usuDao;

	public function __construct() {
		 $this->usuDao = new UsuarioDao();
	}
	
	public function buscarPorEmail($email){		
		return $this->usuDao->buscarPorEmail($email);
	}

	public function crearUsuario($usuarioCrear){
		return $this->usuDao->crearUsuario($usuarioCrear);
	}

	public function actualizarSaldoTicketUser($codigoest,$saldo){
		return $this->usuDao->actualizarSaldoTicketUser($codigoest,$saldo);
	}

	public function actualizarSaldoUsuario($codigoest,$saldo){
		return $this->usuDao->actualizarSaldoUsuario($codigoest,$saldo);
	}

	public function buscarEstudiantePorCodigo($codigoest){
		return $this->usuDao->buscarEstudiantePorCodigo($codigoest);
	}

	public function usuarioExistente($email, $password){
		return $this->usuDao->usuarioExistente($email, $password);
	}

}


 ?>