<?php

use Doctrine\ORM\Mapping as ORM;

/** 
 *@ORM\Entity
 *@ORM\Table(name="pais")
 */
class Pais
{
    /** 
     *@ORM\Id
     *@ORM\Column(type="integer")
     */
    protected $idpais;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $nombre;

    public function getIdPais()
    {
        return $this->idpais;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}
