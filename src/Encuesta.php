<?php

use Doctrine\ORM\Mapping as ORM;

// src/Encuesta.php

/** 
 *@ORM\Entity
 *@ORM\Table(name="encuesta")
 */
class Encuesta
{
    /** 
     *@ORM\Id
     *@ORM\Column(type="integer")
     *@ORM\GeneratedValue
     */
    protected $idencuesta;
    /**
     * @ORM\ManyToOne(targetEntity="Periodosacademicos", inversedBy="Encuesta", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="periodoacademicoid", referencedColumnName="consecutivo_periodo",nullable=true)
     */
    protected $periodoacademico;
    /**
     * @ORM\ManyToOne(targetEntity="Usuarios", inversedBy="Encuesta", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="usuarioid", referencedColumnName="identificacion",nullable=true)
     */
    protected $usuario;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $frecuencia;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $calidad;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $cantidad;      
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $variedad;    
    /** 
     *@ORM\Column(type="string") 
     */
    protected $horario;   
    /** 
     *@ORM\Column(type="string") 
     */
    protected $espacio;   
    /** 
     *@ORM\Column(type="string") 
     */
    protected $calificacionservicio;    
    /** 
     *@ORM\Column(type="string", nullable=true) 
     */
    protected $comentario;    


    public function getIdEncuesta()
    {
        return $this->idencuesta;
    }

    public function getPeriodo()
    {
        return $this->periodoacademico;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }
    public function getCalidad()
    {
        return $this->calidad;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getVariedad()
    {
        return $this->variedad;
    }
    public function getEspacio()
    {
        return $this->espacio;
    }
    public function getHorario()
    {
        return $this->horario;
    }
    public function getCalificacion()
    {
        return $this->califacion;
    }
    public function getComentario()
    {
        return $this->comentario;
    }

    public function setPeriodo($periodoacademico)
    {
        $this->periodoacademico = $periodoacademico;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;
    }
    public function setCalidad($calidad)
    {
        $this->calidad = $calidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function setVariedad($variedad)
    {
        $this->variedad = $variedad;
    }
    public function setEspacio($espacio)
    {
        $this->espacio = $espacio;
    }
    public function setHorario($horario)
    {
        $this->horario = $horario;
    }
    public function setCalificacion($califacion)
    {
        $this->califacion = $califacion;
    }
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }
}
