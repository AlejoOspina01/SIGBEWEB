<?php

use Doctrine\ORM\Mapping as ORM;

// src/Product.php

/** 
 *@ORM\Entity
 *@ORM\Table(name="postulacion")
 */
class Postulacion
{
    /** 
     *@ORM\Id
     *@ORM\Column(type="integer")
     *@ORM\GeneratedValue
     */
    protected $consecutivo_postulacion;
    /** 
     *@ORM\Column(type="float") 
     */
    protected $promedio;
    /** 
     *@ORM\Column(type="date") 
     */
    protected $fechapostulacion;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $semestre;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $estado_postulacion;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $cantModificaciones;
    //documentos
    /** 
     *@ORM\Column(type="string") 
     */
    protected $d10;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $factservicio;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $cartapeticion;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $carnetestudiante;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $cedulapadre;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $cedulamadre;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $comentpsicologa;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $promedioacumulado;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $tabulado;
    //nuevos
    /** 
     *@ORM\Column(type="string") 
     */
    protected $constanciaweb;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $certificadovencidad;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $documentoestudiante;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $documentoacudiente;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $formatosolicitudbeneficio;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $diagnosticomedico;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $recibopagomatricula;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $certificadoingresos;

    /**
     * @ORM\ManyToOne(targetEntity="Usuarios", inversedBy="Postulacion", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="usuario_iden", referencedColumnName="identificacion",nullable=true)
     */
    protected $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="Convocatorias", inversedBy="Postulacion", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="consecutivo_convo", referencedColumnName="consecutivo_convocatoria",nullable=true)
     */
    protected $convocatoria;

    // Getters

    public function getConsecutivo_postulacion(){
        return $this->consecutivo_postulacion;
    }
    public function getPromedio(){
        return $this->promedio;
    }
    public function getFechapostulacion(){
        return $this->fechapostulacion;
    }
    public function getSemestre(){
        return $this->semestre;
    }
    public function getEstado_postulacion(){
        return $this->estado_postulacion;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getConvocatoria(){
        return $this->convocatoria;
    }
    public function getCantmodificaciones(){
        return $this->cantModificaciones;
    }
    public function getComentPsicologa(){
        return $this->comentpsicologa;
    }

    //nuevos

    // BOOLEANOS

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



    // Setters

    public function setConsecutivo_postulacion($consecutivo_postulacion){
        $this->consecutivo_postulacion = $consecutivo_postulacion;
    }
    public function setPromedio($promedio){
        $this->promedio = $promedio;
    }
    public function setFechapostulacion($fechapostulacion){
        $this->fechapostulacion = $fechapostulacion;
    }
    public function setSemestre($semestre){
        $this->semestre = $semestre;
    }
    public function setEstado_postulacion($estado_postulacion){
        $this->estado_postulacion = $estado_postulacion;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function setConvocatoria($convocatoria){
        $this->convocatoria = $convocatoria;
    }
    public function setCantmodificaciones($cantModificaciones){
        $this->cantModificaciones = $cantModificaciones;
    }
    public function setComentPsicologa($comentpsicologa){
        $this->comentpsicologa = $comentpsicologa;
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