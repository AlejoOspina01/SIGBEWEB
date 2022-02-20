<?php

use Doctrine\ORM\Mapping as ORM;

/** 
 *@ORM\Entity
 *@ORM\Table(name="departamento")
 */
class Departamento
{
    /** 
     *@ORM\Id
     *@ORM\Column(type="integer")
     */
    protected $iddepartamento;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $nombre;
    /**
     * @ORM\ManyToOne(targetEntity="Pais", inversedBy="Departamento", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="paisid", referencedColumnName="idpais",nullable=true)
     */
    protected $pais;

    public function getIdDepartamento()
    {
    	return $this->iddepartamento;
    }

    public function getNombre()
    {
    	return $this->nombre;
    }
    public function getPais()
    {
    	return $this->pais;
    }

    public function setNombre($nombre)
    {
    	$this->nombre = $nombre;
    }
    public function setPais($pais)
    {
    	$this->pais = $pais;
    }
}
