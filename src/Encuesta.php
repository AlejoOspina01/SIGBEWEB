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
     *@ORM\Column(type="integer") 
     */
    protected $calidad;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $calidadcomentario;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $cantidad;      
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $variedad;    
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $horario;  
    /** 
     *@ORM\Column(type="string") 
     */
    protected $horariocomentario;       
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $espacio;   
    /** 
     *@ORM\Column(type="string") 
     */
    protected $espaciocomentario;     
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $calificacionservicio; 
    /** 
     *@ORM\Column(type="string") 
     */
    protected $calificacionserviciocomentario; 
       
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
    public function getCalidadComentario()
    {
        return $this->calidadcomentario;
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
    public function getEspacioComentario()
    {
        return $this->espaciocomentario;
    }    
    public function getHorario()
    {
        return $this->horario;
    }
    public function getHorarioComentario()
    {
        return $this->horariocomentario;
    }    
    public function getCalificacion()
    {
        return $this->calificacionservicio;
    }
    public function getCalificacionComentario()
    {
        return $this->calificacionserviciocomentario;
    }    
    public function getComentario()
    {
        return $this->comentario;
    }

    //SETTERS
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
    public function setCalificacion($calificacionservicio)
    {
        $this->calificacionservicio = $calificacionservicio;
    }

    public function setCalidadComentario($calidadcomentario)
    {
        $this->calidadcomentario = $calidadcomentario;
    }
    public function setEspacioComentario($espaciocomentario)
    {
        $this->espaciocomentario = $espaciocomentario;
    }
    public function setHorarioComentario($horariocomentario)
    {
        $this->horariocomentario = $horariocomentario;
    }
    public function setCalificacionComentario($calificacionserviciocomentario)
    {
        $this->calificacionserviciocomentario = $calificacionserviciocomentario;
    }            

    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }
}
