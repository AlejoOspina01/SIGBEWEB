<?php

use Doctrine\ORM\Mapping as ORM;

// src/Product.php

/** 
 *@ORM\Entity
 *@ORM\Table(name="usuarioscarreras")
 */
class UsuariosCarreras
{

    /** 
     *@ORM\Id
     *@ORM\Column(type="integer")
     *@ORM\GeneratedValue
    */
    protected $idusuariocarrera;

    /**
     * @ORM\ManyToOne(targetEntity="Carreras", inversedBy="carreraHasUsuario")
     * @ORM\JoinColumn(name="carreraid", referencedColumnName="codigocarrera",nullable=false)
     */
    protected $carrera;
    /**
     * @ORM\ManyToOne(targetEntity="Usuarios", inversedBy="UsuariosCarreras", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="usuarioid", referencedColumnName="identificacion",nullable=false)
     */
    protected $usuario;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $codigoestudiante;

    public function __toString()
    {
        try {
            return $this->getCarrera()->getNombrecarrera();
        } catch (Exception $exception) {
            return '';
        }
    }

    public function getIdUsuarioCarrera()
    {
        return $this->idusuariocarrera;
    }
    public function getCarrera()
    {
        return $this->carrera;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getCodigoEstudiante()
    {
        return $this->codigoestudiante;
    }

    public function setCarrera($carrera)
    {
        $this->carrera = $carrera;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function setCodigoEstudiante($codigoestudiante)
    {
        $this->codigoestudiante = $codigoestudiante;
    }
}
