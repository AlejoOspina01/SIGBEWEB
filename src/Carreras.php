<?php

use Doctrine\ORM\Mapping as ORM;

/** 
 *@ORM\Entity
 *@ORM\Table(name="carreras")
 */
class Carreras
{
    /** 
     *@ORM\Id
     *@ORM\Column(type="integer")
     */
    protected $codigocarrera;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $nombre_carrera;

    /**
    * @ORM\OneToMany(targetEntity="UsuariosCarreras", mappedBy="carreras", cascade={"all"})
    */
    private $carreraHasUsuario;

    public function getConsecutivoCarrera()
    {
        return $this->codigocarrera;
    }

    public function getNombrecarrera()
    {
        return $this->nombre_carrera;
    }

    public function getCarrerahasusuario()
    {
        return $this->carreraHasUsuario;
    }

    public function setNombrecarrera($nombre_carrera)
    {
        $this->nombre_carrera = $nombre_carrera;
    }
    public function setCarrerahasusuario($carreraHasUsuario)
    {
        $this->carreraHasUsuario = $carreraHasUsuario;
    }
}
