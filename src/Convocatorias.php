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

    /**
    *  
    *
    * @ORM\OneToMany(targetEntity="DocumentoConvocatoria", mappedBy="Convocatorias", cascade={"all"})
    *
    */
    private $ConvocatoriaHasDocumento;
    /**
    *  
    *
    * @ORM\OneToMany(targetEntity="Beneficiarios", mappedBy="Convocatorias", cascade={"all"})
    *
    */
    private $convocatoriaHasBeneficiario;
    

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
    
  }
