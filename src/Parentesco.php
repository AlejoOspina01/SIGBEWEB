<?php

use Doctrine\ORM\Mapping as ORM;

/** 
 *@ORM\Entity
 *@ORM\Table(name="parentesco")
 */
class Parentesco
{
    /** 
     *@ORM\Id
     *@ORM\Column(type="integer")
     */
    protected $idparentesco;
     /**
	 * @ORM\ManyToOne(targetEntity="TipoParentesco", inversedBy="Parentesco", cascade={"persist", "remove" })
	 * @ORM\JoinColumn(name="tipoparentesco", referencedColumnName="idtipoparentesco",nullable=true)
	 */
    protected $tipoparentesco;
      /**
	 * @ORM\ManyToOne(targetEntity="InformacionGeneral", inversedBy="Parentesco", cascade={"persist", "remove" })
	 * @ORM\JoinColumn(name="informacionpariente", referencedColumnName="idinformaciongeneral",nullable=true)
	 */
    private $informacionparentesco;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $nombre;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $edad;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $direccion;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $ciudad;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $ocupacion;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $ingresos;

    public function getIdPariente()
    {
        return $this->idpariente;
    }
    public function getInformacionPariente()
    {
        return $this->informacionpariente;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getCiudad()
    {
        return $this->ciudad;
    }
    public function getOcupacion()
    {
        return $this->ocupacion;
    }
    public function getIngresos()
    {
        return $this->ingresos;
    }

    public function setIdPariente($idpariente)
    {
        $this->idpariente = $idpariente;
    }
    public function setIdInfoEstudiante($informacionpariente)
    {
        $this->informacionpariente = $informacionpariente;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;
    }
    public function setIngresos($ingresos)
    {
        $this->ingresos = $ingresos;
    }
}
