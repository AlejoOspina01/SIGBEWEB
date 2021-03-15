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
    *@ORM\Column(type="string") 
    */
    protected $contrasena;
    /** 
    *@ORM\Column(type="integer") 
    */
    protected $saldo;
    /** 
    *@ORM\Column(type="string") 
    */
    protected $direcciondomicilio;
    /**
	 * @ORM\ManyToOne(targetEntity="Roles", inversedBy="Usuarios", cascade={"persist", "remove" })
	 * @ORM\JoinColumn(name="roles_id", referencedColumnName="IdRol",nullable=true)
	 */
    protected $roles;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $estadouser;
	/** 
     *@ORM\Column(type="string") 
     */
	protected $pdf;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $zonaresidencial;
    /**
     * @ORM\ManyToOne(targetEntity="Ciudad", inversedBy="Usuarios", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="ciudadid", referencedColumnName="idciudad",nullable=true)
     */
    protected $ciudad;
    /** 
     *@ORM\Column(type="date") 
     */
    protected $fechanacimiento;
    /** 
    *@ORM\Column(type="integer") 
    */
    protected $estrato;

    /**
    *  
    *
    * @ORM\OneToMany(targetEntity="UsuariosCarreras", mappedBy="usuarios", cascade={"all"})
    *
    */
    private $usuarioHasCarreras;

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
    public function getCorreo(){
    	return $this->correo;
    }
    public function getContrasena(){
    	return $this->contrasena;
    }
    public function getSaldo(){
    	return $this->saldo;
    }
    public function getDireccion(){
        return $this->direcciondomicilio;
    }
    public function getIdRol(){
    	return $this->roles;
    }
    public function getPdf(){
    	return $this->pdf;
    }
    public function getZonaresidencial(){
        return $this->zonaresidencial;
    }
    public function getCiudad(){
        return $this->ciudad;
    }
    public function getFechanacimiento(){
        return $this->fechanacimiento;
    }
    public function getEstrato(){
        return $this->estrato;
    }
    public function getUsuarioHasCarrera(){
        return $this->usuarioHasCarreras;
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
    public function setCorreo($corre){
    	return $this->correo = $corre;
    }
    public function setContrasena($contra){
    	return $this->contrasena = $contra;
    }
    public function setPdf($subirpdf){
    	return $this->pdf = $subirpdf;
    }
    public function setSaldo($sald){
    	return $this->saldo = $sald;
    }
    public function setDireccion($direcciondomicilio){
        return $this->direcciondomicilio = $direcciondomicilio;
    }
    public function setIdRol($rol){
    	return $this->roles = $rol;
    }
    public function setEstadouser($estadouser){
    	$this->estadouser = $estadouser;
    }
    public function setZonaresidencial($zonaresidencial){
        $this->zonaresidencial = $zonaresidencial;
    }
    public function setCiudad($ciudad){
        $this->ciudad = $ciudad;
    }
    public function setFechanacimiento($fechanacimiento){
        $this->fechanacimiento = $fechanacimiento;
    }
    public function setEstrato($estrato){
        $this->estrato = $estrato;
    }
    public function setUsuarioHasCarrera($usuarioHasCarreras){
        $this->usuarioHasCarreras = $usuarioHasCarreras;
    }
}