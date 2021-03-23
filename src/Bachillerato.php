<?php

use Doctrine\ORM\Mapping as ORM;


/** 
*@ORM\Entity
*@ORM\Table(name="bachillerato")
*/
class Bachillerato 
{
    /** 
    *@ORM\Id
    *@ORM\Column(type="integer")
    *@ORM\GeneratedValue
    */
    protected $idbachillerato;
    /**
	 * @ORM\ManyToOne(targetEntity="InformacionGeneral", inversedBy="Bachillerato", cascade={"persist", "remove" })
	 * @ORM\JoinColumn(name="informacionbachiller", referencedColumnName="idinformaciongeneral",nullable=true)
	 */
    private $informacionbachiller;   
    /** 
     *@ORM\Column(type="string") 
     */
    protected $colegio;
       /** 
     *@ORM\Column(type="string") 
     */
    protected $municipio;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $añogrado;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $pais;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $bachillericfes;
       /** 
     *@ORM\Column(type="integer") 
     */
    protected $añoicfes;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $caractercolegio;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $valormatricula;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $valorpension;

    //Getters
    public function getIdBachillerato(){
    	return $this->idBachillerato;
    }
    public function getInformacionBachiller(){
    	return $this->informacionbachiller;
    }
    public function getIdVisitaColegio(){
    	return $this->idvisitacolegio;
    }
    public function getColegio(){
    	return $this->colegio;
    }
    public function getMunicipioColegio(){
    	return $this->municipio;
    }
    public function getAñoGrado(){
    	return $this->añogrado;
    }
    public function getPaisColegio(){
    	return $this->pais;
    }
    public function getBachillerIcfes(){
    	return $this->bachillericfes;
    } 
    public function getAñoIcfes(){
    	return $this->añoicfes;
    }    
    public function getCaracterColegio(){
    	return $this->caractercolegio;
    }
    public function getValorMatricula(){
    	return $this->valormatricula;
    }
    public function getValorPension(){
    	return $this->valorpension;
    }

 
	//Establecer valores
    public function setIdBachillerato($idBachillerato)
    {
        $this->idBachillerato = $idBachillerato;
    }
    public function setInformacionBachiller($informacionbachiller)
    {
        $this->informacionbachiller = $informacionbachiller;
    }
    
    public function setIdVisitaColegio($idvisitacolegio){
    	 $this->idvisitacolegio = $idvisitacolegio;
    }
    public function setColegio($colegio){
    	 $this->colegio = $colegio;
    }
    public function setMunicipio($municipio){
    	 $this->municipio = $municipio;
    }
    public function setAñoGrado($añogrado){
    	 $this->añogrado = $añogrado;
    }
    public function setPais($pais){
    	 $this->pais = $pais;
    }     
    public function setBachillerIcfes($bachillericfes){
    	 $this->bachillericfes = $bachillericfes;
    }
    public function setCaracterColegio($caractercolegio){
    	 $this->caractercolegio = $caractercolegio;
    }
    public function setValorMatricula($valormatricula){
    	 $this->valormatricula = $valormatricula;
    }
    public function setValorPension($valorpension){
    	 $this->valorpension = $valorpension;
    }
    
}