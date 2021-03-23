<?php

use Doctrine\ORM\Mapping as ORM;


/** 
*@ORM\Entity
*@ORM\Table(name="informacionfamiliar")
*/
class InformacionFamiliar 
{
    /** 
    *@ORM\Id
    *@ORM\Column(type="integer")
    *@ORM\GeneratedValue
    */
    protected $idinformacionfamiliar;
    /**
	 * @ORM\ManyToOne(targetEntity="InformacionGeneral", inversedBy="InformacionFamiliar", cascade={"persist", "remove" })
	 * @ORM\JoinColumn(name="informaciongeneral", referencedColumnName="idinformaciongeneral",nullable=true)
	 */
    private $informaciongeneral;   
    /** 
     *@ORM\Column(type="string") 
     */
    protected $casapropia;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $hipoteca;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $valormensualamortizacion;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $valormensualarriendo;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $jefefamilia;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $niveleducativojefe;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $ingresomensualfamiliar;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $posicionjefe;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $empresajefe;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $ocupacionjefe;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $ingresojefe;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $direccionempresajefe;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $ciudadjefe;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $telefono;

    //Getters
    public function getInformacionFamiliar(){
    	return $this->idinformacionfamiliar;
    }
    public function getInformacionGeneral(){
    	return $this->informaciongeneral;
    }
    public function getCasaPropia(){
    	return $this->casapropia;
    }
    public function getHipoteca(){
    	return $this->hipoteca;
    }
    public function getValorMensualAmortizacion(){
    	return $this->valormensualamortizacion;
    }
    public function getValorMensualArriendo(){
    	return $this->valormensualarriendo;
    }
    public function getJefeFamilia(){
    	return $this->jefefamilia;
    }     
    public function getNivelEducativoJefe(){
    	return $this->niveleducativojefe;
    }
    public function getIngresoMensualFamiliar(){
    	return $this->ingresomensualfamiliar;
    }
    public function getPosicionJefe(){
    	return $this->posicionjefe;
    }
    public function getEmpresaJefe(){
    	return $this->empresajefe;
    }
    public function getOcupacionJefe(){
    	return $this->ocupacionjefe;
    }
    public function getIngresoJefe(){
    	return $this->ingresojefe;
    }
    public function getDireccionEmpresaJefe(){
    	return $this->direccionempresajefe;
    }
    public function getCiudad(){
    	return $this->ciudad;
    }
    public function getTelefono(){
    	return $this->telefono;
    }
    

 
	//Establecer valores
    public function setInformacionFamiliar($idinformacionfamiliar)
    {
        $this->idinformacionfamiliar = $idinformacionfamiliar;
    }
    public function setInformaciongeneral($informaciongeneral)
    {
        $this->informaciongeneral = $informaciongeneral;
    }
    public function setCasaPropia($casapropia){
    	 $this->casapropia = $casapropia;
    }
    public function setValorMensualAmortizacion($valormensualamortizacion){
    	 $this->valormensualamortizacion = $valormensualamortizacion;
    }     
    public function setMensualArriendo($valormensualarriendo){
    	 $this->valormensualarriendo = $valormensualarriendo;
    }
    public function setJefeFamilia($jefefamilia){
    	 $this->jefefamilia = $jefefamilia;
    }
    public function setNivelEducativoJefe($niveleducativojefe){
    	 $this->niveleducativojefe = $niveleducativojefe;
    }
    public function setIngresoMensualFamiliar($ingresomensualfamiliar){
    	 $this->ingresomensualfamiliar = $ingresomensualfamiliar;
    }
    public function setPosicionJefe($posicionjefe){
        $this->posicionjefe = $posicionjefe;
   }
    public function setEmpresaJefe($empresajefe){
        $this->empresajefe = $empresajefe;
   }
    public function setOcupacionJefe($ocupacionjefe){
        $this->ocupacionjefe = $ocupacionjefe;
   }
    public function setIngresoJefe($ingresojefe){
        $this->ingresojefe = $ingresojefe;
   }
    public function setDireccionEmpresaJefe($direccionempresajefe){
        $this->direccionempresajefe = $direccionempresajefe;
   }
    public function setCiudad($ciudad){
        $this->ciudad = $ciudad;
   }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
}