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
     *@ORM\GeneratedValue
     */
    protected $idparentesco;
     /**
	 * @ORM\ManyToOne(targetEntity="TipoParentesco", inversedBy="Parentesco", cascade={"persist", "remove" })
	 * @ORM\JoinColumn(name="tipoparentesco", referencedColumnName="idtipoparentesco")
	 */
    protected $tipoparentesco;
      /**
	 * @ORM\ManyToOne(targetEntity="InformacionGeneral", inversedBy="Parentesco", cascade={"persist", "remove" })
	 * @ORM\JoinColumn(name="informacionparentesco", referencedColumnName="idinformaciongeneral")
	 */
    protected $informacionparentesco;
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
     *@ORM\Column(type="integer") 
     */
    protected $ingresos;

    public function getIdPariente()
    {
        return $this->idparentesco;
    }
    public function getInformacionParentesco()
    {
        return $this->informacionparentesco;
    }
    public function getTipoParentesco()
    {
        return $this->tipoparentesco;
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

    public function setIdParentesco($idparentesco)
    {
        $this->idparentesco = $idparentesco;
    }
    public function setInformacionParentesco($informacionparentesco)
    {
        $this->informacionparentesco = $informacionparentesco;
    }
    public function setTipoParentesco($tipoparentesco)
    {
        $this->tipoparentesco = $tipoparentesco;
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
