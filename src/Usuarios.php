<?php

use Doctrine\ORM\Mapping as ORM;

// src/Roles.php

/** 
*@ORM\Entity
*@ORM\Table(name="usuarios")
*/
class Usuarios
{
/** 
    *@ORM\Id
    *@ORM\Column(type="integer")
*/
    protected $identificacion;
     /** 
    *@ORM\Column(type="string") 
    */
    protected $nombre;

    /** 
    *@ORM\Column(type="string") 
    */
    protected $apellido;
    /** 
    *@ORM\Column(type="string") 
    */
    protected $correo;
    /** 
    *@ORM\Column(type="integer") 
    */
    protected $codigoestudiante;
    /** 
    *@ORM\Column(type="string") 
    */
    protected $contrasena;
    /** 
    *@ORM\Column(type="integer") 
    */
    protected $saldo;
    /**
	 * @ORM\ManyToOne(targetEntity="Roles", inversedBy="Usuarios", cascade={"persist", "remove" })
	 * @ORM\JoinColumn(name="roles_id", referencedColumnName="IdRol",nullable=true)
	 */
    protected $roles;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $estadouser;

    /* public function __construct($identificacion, $nombre,$apellido,$correo,$codigoestudiante,$contrasena,$saldo,$roles)
    {
        $this->name = $identificacion;
        $this->year = $nombre;
        $this->name = $apellido;
        $this->year = $correo;
        $this->name = $codigoestudiante;
        $this->year = $contrasena;
        $this->name = $saldo;
        $this->year = $roles;
    } */


	public function getIdentifacion(){
		return $this->identificacion;
	}
	public function getEstadouser(){
		return $this->estadouser;
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
		return $this->roles;
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
		return $this->roles = $rol;
	}
	public function setEstadouser($estadouser){
		$this->estadouser = $estadouser;
	}
}