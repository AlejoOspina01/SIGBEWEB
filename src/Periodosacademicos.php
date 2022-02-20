<?php

use Doctrine\ORM\Mapping as ORM;

// src/Product.php

/** 
*@ORM\Entity
*@ORM\Table(name="periodosacademicos")
*/
class Periodosacademicos
{
    /** 
        *@ORM\Id
        *@ORM\Column(type="integer")
        *@ORM\GeneratedValue
    */
    protected $consecutivo_periodo;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $descripcion;
     /** 
    *@ORM\Column(type="datetime") 
    */
     protected $fecha_inicio;
    /** 
    *@ORM\Column(type="datetime") 
    */
    protected $fecha_fin;
    /**
     * @ORM\Column(type="boolean", options={"default":"0"})
     */
    protected $estadoperiodo;

    public function getConsecutivo_periodo()
    {
        return $this->consecutivo_periodo;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }
    public function getEstadoPeriodo()
    {
        return $this->estadoperiodo;
    }

    //Establecer valores
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function setFechaInicio($fechaInicio)
    {
        $this->fecha_inicio = $fechaInicio;
    }
    public function setFechaFin($fechaFin)
    {
        $this->fecha_fin = $fechaFin;
    }
    public function setEstadoPeriodo($estadoperiodo)
    {
        $this->estadoperiodo = $estadoperiodo;
    }
}