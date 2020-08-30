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

     /**
    * @ORM\OneToMany(targetEntity="Usuarios", mappedBy="Roles")
    */
    protected $usuarios;

  public function __construct($IdRol, $descripcion)
    {
        
        $this->IdRol = $IdRol;
        $this->descripcion = $descripcion;
        $this->usuarios = new ArrayCollection();
    }
    

    public function getIdRol()
    {
        return $this->IdRol;
    }

    public function getdescripcion()
    {
        return $this->descripcion;
    }

        public function getusuarios()
    {
        return $this->usuarios;
    }

    public function setdescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }


}