<?php

use Doctrine\ORM\Mapping as ORM;

// src/Product.php

/** 
 *@ORM\Entity
 *@ORM\Table(name="becas")
 */
class Becas
{
    /** 
     *@ORM\Id
     *@ORM\Column(type="integer")
     *@ORM\GeneratedValue
     */
    protected $consecutivo_beca;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $descripcion;
    /**
     * @ORM\ManyToOne(targetEntity="TipoBecas", inversedBy="Becas", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="tipobecaid", referencedColumnName="consecutivo_TipoBeca",nullable=true)
     */
    protected $tipobecas;

    public function getConsecutivo_beca()
    {
        return $this->consecutivo_beca;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getTipoBecas()
    {
        return $this->tipobecas;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setTipoBeca($tipoBecas)
    {
        $this->tipobecas = $tipoBecas;
    }
}
