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
     * @ORM\JoinColumn(name="idpostulaciongeneral", referencedColumnName="consecutivo_postulacion")
     */
    private $idpostulaciongeneral;
  
    /** 
     *@ORM\Column(type="string") 
     */
    protected $lugarnacimiento;
    /** 
     *@ORM\Column(type="string") 
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
     *@ORM\Column(type="string") 
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

    //Getters
    public function getIdInformacionEstudiante(){
    	return $this->idinformacionestudiante;
    }
    public function getPostulacion(){
    	return $this->idpostulaciongeneral;
    }
    public function getParienteEstudiante(){
    	return $this->idparienteestudiante;
    }
    public function getIdFuenteNecesidad(){
    	return $this->idfuentenecesidad;
    }
    public function getIdBachiller(){
    	return $this->idbachiller;
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

 
    

	//Establecer valores
    public function setIdInformacionEstudiante($idinformacionestudiante)
    {
        $this->idinformacionestudiante = $idinformacionestudiante;
    }

    public function setPostulacion($idpostulaciongeneral){
    	 $this->idpostulaciongeneral = $idpostulaciongeneral;
    }
    public function setPariente($idpariente){
        $this->idpariente = $idpariente;
    }
    public function setIdFuenteNecesidad($idfuentenecesidad){
        $this->idfuentenecesidad = $idfuentenecesidad;
    }
    public function setIdBachiller($idbachiller){
        $this->idbachiller = $idbachiller;
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
    
}