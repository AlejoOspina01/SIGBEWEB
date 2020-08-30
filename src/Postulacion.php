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
     *@ORM\Column(type="integer") 
     */
    protected $estrato;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $estado_postulacion;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $cantModificaciones;

    /**
     * @ORM\ManyToOne(targetEntity="Usuarios", inversedBy="Postulacion", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="usuarioid", referencedColumnName="identificacion",nullable=true)
     */
    protected $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="convocatorias", inversedBy="postulacion", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="convocatoriaid", referencedColumnName="consecutivo_convocatoria",nullable=true)
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
    public function getEstrato(){
        return $this->estrato;
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
    public function setEstrato($estrato){
        $this->estrato = $estrato;
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


}