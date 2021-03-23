<?php

use Doctrine\ORM\Mapping as ORM;

/** 
 *@ORM\Entity
 *@ORM\Table(name="tipoparentesco")
 */
class TipoParentesco
{
    /** 
     *@ORM\Id
     *@ORM\Column(type="integer")
     */
    protected $idtipoparentesco;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $nombreparentesco;

    public function getIdTipoPariente()
    {
        return $this->idtipoparentesco;
    }

    public function getNombreParentesco()
    {
        return $this->nombreparentesco;
    }

    public function setIdTipoParentesco($idtipoparentesco)
    {
        $this->idtipoparentesco = $idtipoparentesco;
    }
    public function setNombreParentesco($nombreparentesco)
    {
        $this->nombreparentesco = $nombreparentesco;
    }
}
