<?php

use Doctrine\ORM\Mapping as ORM;

/** 
 *@ORM\Entity
 *@ORM\Table(name="ciudad")
 */
class Ciudad
{
    /** 
     *@ORM\Id
     *@ORM\Column(type="integer")
     */
    protected $idciudad;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $nombre;
    /**
     * @ORM\ManyToOne(targetEntity="Departamento", inversedBy="Ciudad", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="departamentoid", referencedColumnName="iddepartamento",nullable=true)
     */
    protected $departamento;

    public function getIdDepartamento()
    {
    	return $this->idciudad;
    }

    public function getNombre()
    {
    	return $this->nombre;
    }
    public function getDepartamento()
    {
    	return $this->departamento;
    }

    public function setNombre($nombre)
    {
    	$this->nombre = $nombre;
    }
    public function setDepartamento($departamento)
    {
    	$this->departamento = $departamento;
    }
}
