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
    *@ORM\Column(type="datetime") 
    */
    protected $fecha_inicio;
     /** 
    *@ORM\Column(type="datetime") 
    */
    protected $fecha_fin;

    public function getConsecutivo_periodo()
    {
        return $this->consecutivo_periodo;
    }

    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    public function setFechaInicio($fechaInicio)
    {
        $this->fecha_inicio = $fechaInicio;
    }
    public function setFechaFin($fechaFin)
    {
        $this->fecha_fin = $fechaFin;
    }
}