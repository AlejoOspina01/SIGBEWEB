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
    /** 
     *@ORM\Column(type="string") 
     */
    protected $comentpsicologa;
        /** 
     *@ORM\Column(type="integer",nullable=true) 
     */
    protected $estadopromedio;

    /**
     * @ORM\ManyToOne(targetEntity="UsuariosCarreras", inversedBy="Postulacion", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="usuariocarreraid", referencedColumnName="idusuariocarrera",nullable=true)
     */
    protected $usuariocarrera;

    /**
     * @ORM\ManyToOne(targetEntity="Convocatorias", inversedBy="Postulacion", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="consecutivo_convo", referencedColumnName="consecutivo_convocatoria",nullable=true)
     */
    protected $convocatoria;
    /**
    *  
    *
    * @ORM\OneToMany(targetEntity="DocumentoPostulacion", mappedBy="Postulacion", cascade={"all"})
    *
    */
    private $PostulacionHasDocumento;

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
    public function getUsuarioCarrera(){
        return $this->usuariocarrera;
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
    public function getEstadoPromedio(){
        return $this->estadopromedio;
    }
    //nuevos




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
    public function setUsuarioCarrera($usuariocarrera){
        $this->usuariocarrera = $usuariocarrera;
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
    public function setEstadoPromedio($estadopromedio){
        $this->estadopromedio = $estadopromedio;
    }  
    
}