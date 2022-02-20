<?php

use Doctrine\ORM\Mapping as ORM;


/** 
*@ORM\Entity
*@ORM\Table(name="visitadomiciliaria")
*/
class VisitaDomiciliaria 
{
    /** 
    *@ORM\Id
    *@ORM\Column(type="integer")
    *@ORM\GeneratedValue
    */
    protected $idvisita;
    
    /**
     * @ORM\OneToOne(targetEntity="Postulacion")
     * @ORM\JoinColumn(name="postulacionid", referencedColumnName="consecutivo_postulacion")
     */
    private $postulacion;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $estamento;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $barrio;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $comuna;
    /** 
    *@ORM\Column(type="string") 
    */
     protected $nombreatencion;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $parentesco;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $obligacion;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $cualobligacion;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $estratodane;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $pagoarriendo;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $valorarriendo;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $cubrearriendo;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $otroarriendo;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $fuenteingreso;
     /** 
     *@ORM\Column(type="string") 
     */
    protected $cualfuente;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $tipocasa;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $aspectocasa;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $cualaspecto;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $serviciopublico;
       /** 
     *@ORM\Column(type="string") 
     */
    protected $cuartosolicitante;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $cantidadpersonas;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $descripcionfinal;
     /** 
     *@ORM\Column(type="date") 
     */
    protected $fecharegistro;
    

    //Getters
    public function getIdVisita(){
    	return $this->idvisita;
    }
    public function getPostulacion(){
    	return $this->postulacion;
    }
    public function getEstamento(){
    	return $this->estamento;
    }
    public function getBarrio(){
    	return $this->barrio;
    }
    public function getComuna(){
    	return $this->comuna;
    }
    public function getNombreAtencion(){
    	return $this->nombreatencion;
    }
    public function getParentesco(){
    	return $this->parentesco;
    }     
    public function getObligacion(){
    	return $this->obligacion;
    }
    public function getCualObligacion(){
    	return $this->cualobligacion;
    }
    public function getEstratoDane(){
    	return $this->estratodane;
    }
    public function getPagoArriendo(){
    	return $this->pagoarriendo;
    }
    public function getValorArriendo(){
    	return $this->valorarriendo;
    }
    public function getCubreArriendo(){
    	return $this->cubrearriendo;
    }
    public function getOtroArriendo(){
    	return $this->otroarriendo;
    }
    public function getFuenteIngreso(){
    	return $this->fuenteingreso;
    }
    public function getCualFuente(){
    	return $this->cualfuente;
    }
    public function getTipoCasa(){
    	return $this->tipocasa;
    }
    public function getAspectoCasa(){
    	return $this->aspectocasa;
    }
    public function getCualAspecto(){
    	return $this->cualaspecto;
    }
    public function getServicioPublico(){
    	return $this->serviciopublico;
    }
    public function getCuartoSolicitante(){
    	return $this->cuartosolicitante;
    }
    public function getCantidadPersonas(){
    	return $this->cantidadpersonas;
    }
    public function getDescripcionFinal(){
    	return $this->descripcionfinal;
    }
    public function getFechaRegistro(){
        return $this->fecharegistro;
    } 


	//Establecer valores
    public function setIdVisita($idvisita)
    {
        $this->idvisita = $idvisita;
    }

    public function setPostulacion($postulacion){
    	 $this->postulacion = $postulacion;
    }
    public function setEstamento($estamento){
    	 $this->estamento = $estamento;
    }
    public function setBarrio($barrio){
    	 $this->barrio = $barrio;
    }
    public function setComuna($comuna){
    	 $this->comuna = $comuna;
    }
    public function setNombreAtencion($nombreatencion){
    	 $this->nombreatencion = $nombreatencion;
    }
    public function setParentesco($parentesco){
    	 $this->parentesco = $parentesco;
    }     
    public function setObligacion($obligacion){
    	 $this->obligacion = $obligacion;
    }
    public function setCualObligacion($cualobligacion){
    	 $this->cualobligacion = $cualobligacion;
    }
    public function setEstratoDane($estratodane){
    	 $this->estratodane = $estratodane;
    }
    public function setPagoArriendo($pagoarriendo){
    	 $this->pagoarriendo = $pagoarriendo;
    }
    public function setValorArriendo($valorarriendo){
    	 $this->valorarriendo = $valorarriendo;
    }
    public function setCubreArriendo($cubrearriendo){
    	 $this->cubrearriendo = $cubrearriendo;
    }
    public function setOtroArriendo($otroarriendo){
    	 $this->otroarriendo = $otroarriendo;
    }
    public function setFuenteIngreso($fuenteingreso){
    	 $this->fuenteingreso = $fuenteingreso;
    }
    public function setCualFuente($cualfuente){
    	 $this->cualfuente = $cualfuente;
    }
    public function setTipoCasa($tipocasa){
    	 $this->tipocasa = $tipocasa;
    }
    public function setAspectoCasa($aspectocasa){
    	 $this->aspectocasa = $aspectocasa;
    }
    public function setCualAspecto($cualaspecto){
    	 $this->cualaspecto = $cualaspecto;
    }
    public function setServicioPublico($serviciopublico){
    	 $this->serviciopublico = $serviciopublico;
    }
    public function setCuartoSolicitante($cuartosolicitante){
    	 $this->cuartosolicitante = $cuartosolicitante;
    }
    public function setCantidadPersonas($cantidadpersonas){
    	 $this->cantidadpersonas = $cantidadpersonas;
    }
    public function setDescripcionFinal($descripcionfinal){
    	 $this->descripcionfinal = $descripcionfinal;
    }
    public function setFechaRegistro($fecharegistro){
        $this->fecharegistro = $fecharegistro;
    }    

}