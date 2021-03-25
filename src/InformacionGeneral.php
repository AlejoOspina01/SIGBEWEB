<?php

use Doctrine\ORM\Mapping as ORM;


/** 
*@ORM\Entity
*@ORM\Table(name="informaciongeneral")
*/
class InformacionGeneral 
{
    /** 
    *@ORM\Id
    *@ORM\Column(type="integer")
    *@ORM\GeneratedValue
    */
    protected $idinformaciongeneral;
    
    /**
     * @ORM\OneToOne(targetEntity="Postulacion")
     * @ORM\JoinColumn(name="idpostulaciongeneral", referencedColumnName="consecutivo_postulacion",nullable=true)
     */
    private $idpostulaciongeneral;
  
    /** 
     *@ORM\Column(type="string") 
     */
    protected $lugarnacimiento;
    /** 
     *@ORM\Column(type="date") 
     */
    protected $expedicioncedula;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $estadocivil;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $numerohijos;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $municipioprocedencia;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $direccion;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $barrio;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $telefono;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $direccioncali;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $barriocali;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $telefonocali;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $residencia;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $trabaja;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $cargotrabajador;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $nombreempresa;
     /** 
     *@ORM\Column(type="string") 
     */
    protected $antiguedad;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $ciudadempresa;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $direccionempresa;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $valortotalingreso;
    
    /** 
     *@ORM\Column(type="string") 
     */
    protected $observacion;
     /** 
     *@ORM\Column(type="date") 
     */
    protected $fecharegistro;

    //Getters
    public function getIdinformacionGeneral(){
    	return $this->idinformaciongeneral;
    }
    public function getPostulacion(){
    	return $this->idpostulaciongeneral;
    }
    public function getLugarNacimiento(){
    	return $this->lugarnacimiento;
    }
    public function getExpedicionCedula(){
    	return $this->expedicioncedula;
    }
    public function getEstadoCivil(){
    	return $this->estadocivil;
    }
    public function getNumeroHijos(){
    	return $this->numerohijos;
    }
    public function getMunicipioProcedencia(){
    	return $this->municipioprocedencia;
    }     
    public function getDireccion(){
    	return $this->direccion;
    }
    public function getBarrio(){
    	return $this->barrio;
    }
    public function getTelefono(){
    	return $this->telefono;
    }
    public function getDireccionCali(){
    	return $this->direccioncali;
    }
    public function getBarrioCali(){
    	return $this->barriocali;
    }
    public function getTelefonoCali(){
    	return $this->telefonocali;
    }
    public function getResidencia(){
    	return $this->residencia;
    }
    public function getTrabaja(){
    	return $this->trabaja;
    }
    public function getCargoTrabajador(){
    	return $this->cargotrabajador;
    }
    public function getNombreEmpresa(){
    	return $this->nombreempresa;
    }
    public function getAntiguedad(){
    	return $this->antiguedad;
    }
    public function getCiudadEmpresa(){
    	return $this->ciudadempresa;
    }
    public function getDireccionEmpresa(){
    	return $this->direccionempresa;
    }
    public function getValorTotalIngreso(){
    	return $this->valortotalingreso;
    }
    public function getObservacion(){
    	return $this->observacion;
    }
    public function getFechaRegistro(){
    	return $this->fecharegistro;
    }

 
    

	//Establecer valores
    public function setIdInformacionGeneral($idinformaciongeneral)
    {
        $this->idinformaciongeneral = $idinformaciongeneral;
    }

    public function setPostulacion($idpostulaciongeneral){
    	 $this->idpostulaciongeneral = $idpostulaciongeneral;
    }
    public function setLugarNacimiento($lugarnacimiento){
    	 $this->lugarnacimiento = $lugarnacimiento;
    }
    public function setExpedicionCedula($expedicioncedula){
    	 $this->expedicioncedula = $expedicioncedula;
    }
    public function setEstadoCivil($estadocivil){
    	 $this->estadocivil = $estadocivil;
    }
    public function setNumeroHijos($numerohijos){
    	 $this->numerohijos = $numerohijos;
    }
    public function setMunicipioProcedencia($municipioprocedencia){
    	 $this->municipioprocedencia = $municipioprocedencia;
    }     
    public function setDireccion($direccion){
    	 $this->direccion = $direccion;
    }
    public function setBarrio($barrio){
        $this->barrio = $barrio;
   }
    public function setTelefono($telefono){
    	 $this->telefono = $telefono;
    }
    public function setDireccionCali($direccioncali){
    	 $this->direccioncali = $direccioncali;
    }
    public function setBarrioCali($barriocali){
    	 $this->barriocali = $barriocali;
    }
    public function setTelefonoCali($telefonocali){
    	 $this->telefonocali = $telefonocali;
    }
    public function setResidencia($residencia){
    	 $this->residencia = $residencia;
    }
    public function setTrabaja($trabaja){
    	 $this->trabaja = $trabaja;
    }
    public function setCargoTrabajador($cargotrabajador){
    	 $this->cargotrabajador = $cargotrabajador;
    }
    public function setNombreEmpresa($nombreempresa){
    	 $this->nombreempresa = $nombreempresa;
    }
    public function setAntiguedad($antiguedad){
    	 $this->antiguedad = $antiguedad;
    }
    public function setCiudadEmpresa($ciudadempresa){
    	 $this->ciudadempresa = $ciudadempresa;
    }
    public function setDireccionEmpresa($direccionempresa){
    	 $this->direccionempresa = $direccionempresa;
    }
    public function setValorTotalIngreso($valortotalingreso){
    	 $this->valortotalingreso = $valortotalingreso;
    }
    public function setObservacion($observacion){
    	 $this->observacion = $observacion;
    }
    public function setFechaRegistro($fecharegistro){
        $this->fecharegistro = $fecharegistro;
   }
    
}