<?php

use Doctrine\ORM\Mapping as ORM;

// src/Product.php

/** 
*@ORM\Entity
*@ORM\Table(name="roles")
*/
class Roles
{
/** 
    *@ORM\Id
    *@ORM\Column(type="integer")
    *@ORM\GeneratedValue
*/
    protected $IdRol;
     /** 
    *@ORM\Column(type="string") 
    */
    protected $descripcion;

    public function getIdRol()
    {
        return $this->IdRol;
    }

    public function getdescripcion()
    {
        return $this->descripcion;
    }

    public function setdescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
}