<?php

use Doctrine\ORM\Mapping as ORM;

// src/Roles.php

/** 
 *@ORM\Entity
 *@ORM\Table(name="convocatorias")
 */
class Convocatorias
{
    /** 
     *@ORM\Id
     *@ORM\Column(type="integer")
     *@ORM\GeneratedValue
     */
    protected $consecutivo_convocatoria;
    /** 
     *@ORM\Column(type="datetime") 
     */
    protected $fecha_inicio;
    /** 
     *@ORM\Column(type="datetime") 
     */
    protected $fecha_fin;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $estado_convocatoria;
     /** 
     *@ORM\Column(type="integer") 
     */
    protected $cupo;
    /**
     * @ORM\ManyToOne(targetEntity="Becas", inversedBy="Convocatorias", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="becasid", referencedColumnName="consecutivo_beca",nullable=true)
     */
    protected $becas;
    /**
     * @ORM\ManyToOne(targetEntity="Periodosacademicos", inversedBy="Convocatorias", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="periodosacademicosid", referencedColumnName="consecutivo_periodo",nullable=true)
     */
    protected $periodosacademicos;

    //Boolean
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $d10;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $factservicio;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $cartapeticion;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $carnetestudiante;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $cedulapadre;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $cedulamadre;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $comentpsicologa;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $promedioacumulado;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $tabulado;
    //nuevos
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $constanciaweb;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $certificadovencidad;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $documentoestudiante;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $documentoacudiente;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $formatosolicitudbeneficio;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $diagnosticomedico;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $recibopagomatricula;
    /** 
     *@ORM\Column(type="boolean") 
     */
    protected $certificadoingresos;

    //Datos Convocatoria
    public function getConsecutivoConvocatoria()
    {
        return $this->consecutivo_convocatoria;
    }

    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }
    public function getEstadoConvocatoria()
    {
        return $this->estado_convocatoria;
    }
    public function getCupo(){
      return $this->cupo;
    }
    public function getConsecutivoBeca(){
		return $this->becas;
    }
    public function getConsecutivoPeriodo(){
		return $this->periodosacademicos;
	}
    //get boolean
    public function getD10(){
      return $this->d10;
  }
  public function getFactservicio(){
      return $this->factservicio;
  }
  public function getCartapeticion(){
      return $this->cartapeticion;
  }
  public function getCarnetestudiante(){
      return $this->carnetestudiante;
  }
  public function getCedulaPadre(){
      return $this->cedulapadre;
  }
  public function getCedulamadre(){
      return $this->cedulamadre;
  }
  public function getPromedioacumulado(){
      return $this->promedioacumulado;
  }
  public function getTabulado(){
      return $this->tabulado;
  }
  public function getConstanciaweb(){
      return $this->constanciaweb;
  }
  public function getCertificadovencindad(){
      return $this->certificadovencidad;
  }
  public function getDocumentoidentidad(){
      return $this->documentoestudiante;
  }
  public function getDocumentoAcudiente(){
      return $this->documentoacudiente;
  }
  public function getFormatosolicitud(){
      return $this->formatosolicitudbeneficio;
  }
  public function getDiagnostico(){
      return $this->diagnosticomedico;
  }
  public function getRecibomatricula(){
      return $this->recibopagomatricula;
  }
  public function getCertificadoIngresos(){
      return $this->certificadoingresos;
  }

    //Establecer valores
    public function setEstadoConvocatoria($estadoconvocatoria){
      $this->estado_convocatoria = $estadoconvocatoria;
  }
    public function setFechaInicio($fechaInicio){
        $this->fecha_inicio = $fechaInicio;
    }
    public function setFechaFin($fechaFin){
        $this->fecha_fin = $fechaFin;
    }
    public function setCupo($cupo){
      $this->cupo = $cupo;
    }
    public function setConsecutivoBeca($consecutivoBeca){
		return $this->becas = $consecutivoBeca;
    }
    public function setConsecutivoPeriodo($consecutivoPeriodo){
		return $this->periodosacademicos = $consecutivoPeriodo;
	}
 // BOOLEANOS SETTERS
    public function setD10($d10){
      $this->d10 =$d10;
    }
    public function setFactservicio($factservicio){
      $this->factservicio = $factservicio;
    }
    public function setCartapeticion($cartapeticion){
      $this->cartapeticion = $cartapeticion;
    }
    public function setCarnetestudiante($carnetestudiante){
      $this->carnetestudiante = $carnetestudiante;
    }
    public function setCedulaPadre($cedulapadre){
      $this->cedulapadre =$cedulapadre;
    }
    public function setCedulamadre($cedulamadre){
      $this->cedulamadre = $cedulamadre;
    }
    public function setPromedioacumulado($promedioacumulado){
      $this->promedioacumulado = $promedioacumulado;
    }
    public function setTabulado($tabulado){
      $this->tabulado = $tabulado;
    }
    public function setConstanciaweb($constanciaweb){
      $this->constanciaweb = $constanciaweb;
    }
    public function setCertificadovencindad($certificadovencidad){
      $this->certificadovencidad = $certificadovencidad;
    }
    public function setDocumentoidentidad($documentoestudiante){
      $this->documentoestudiante = $documentoestudiante;
    }
    public function setDocumentoAcudiente($documentoacudiente){
      $this->documentoacudiente = $documentoacudiente;
    }
    public function setFormatosolicitud($formatosolicitudbeneficio){
      $this->formatosolicitudbeneficio = $formatosolicitudbeneficio;
    }
    public function setDiagnostico($diagnosticomedico){
      $this->diagnosticomedico = $diagnosticomedico;
    }
    public function setRecibomatricula($recibopagomatricula){
      $this->recibopagomatricula = $recibopagomatricula;
    }
    public function setCertificadoIngresos($certificadoingresos){
      $this->certificadoingresos = $certificadoingresos;
    }
        
}
