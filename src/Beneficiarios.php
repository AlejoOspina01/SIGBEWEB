<?php

use Doctrine\ORM\Mapping as ORM;

// src/Beneficiarios.php

/** 
 *@ORM\Entity
 *@ORM\Table(name="beneficiarios")
 */
class Beneficiarios
{

    /**
     * @ORM\Id    
     * @ORM\ManyToOne(targetEntity="Convocatorias", inversedBy="Beneficiarios")
     * @ORM\JoinColumn(name="convocatoriaid", referencedColumnName="consecutivo_convocatoria",nullable=false)
     */
    protected $convocatoria;
    /**
     * @ORM\Id    
     * @ORM\ManyToOne(targetEntity="Postulacion", inversedBy="Beneficiarios")
     * @ORM\JoinColumn(name="postulacionid", referencedColumnName="consecutivo_postulacion",nullable=false)
     */
    protected $postulacion;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $tiempobeneficiario;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $tiempobeneficiariorestante;    
    /** 
     *@ORM\Column(type="date") 
     */
    protected $fechabeneficiario;    
    /** 
     *@ORM\Column(type="string") 
     */
    protected $observacion;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $estado;

    public function __toString()
    {
        try {
            return $this->getCarrera()->getNombrecarrera();
        } catch (Exception $exception) {
            return '';
        }
    }

    public function getConvocatoria()
    {
        return $this->convocatoria;
    }
    public function getPostulacion()
    {
        return $this->postulacion;
    }
    public function getFechaBeneficiario()
    {
        return $this->fechabeneficiario;
    }    
    public function getTiempoBeneficiario()
    {
        return $this->tiempobeneficiario;
    }
    public function getTiempoBeneficiarioRestante()
    {
        return $this->tiempobeneficiariorestante;
    }    
    public function getObservacion()
    {
        return $this->observacion;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    //SETTERS

    public function setConvocatoria($convocatoria)
    {
        $this->convocatoria = $convocatoria;
    }
    public function setPostulacion($postulacion)
    {
        $this->postulacion = $postulacion;
    }
    public function setFechaBeneficiario($fechabeneficiario)
    {
        $this->fechabeneficiario = $fechabeneficiario;
    }  
    public function setTiempoBeneficiario($tiempobeneficiario)
    {
        $this->tiempobeneficiario = $tiempobeneficiario;
    }
    public function setTiempoBeneficiarioRestante($tiempobeneficiariorestante)
    {
        $this->tiempobeneficiariorestante = $tiempobeneficiariorestante;
    }    
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }    
}
