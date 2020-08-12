<?php

use Doctrine\ORM\Mapping as ORM;

// src/Roles.php

/** 
*@ORM\Entity
*@ORM\Table(name="tipobecas")
*/
class TipoBecas
{
/** 
    *@ORM\Id
    *@ORM\Column(type="integer")
    *@ORM\GeneratedValue
*/
    protected $consecutivo_TipoBeca;
     /** 
    *@ORM\Column(type="string") 
    */
    protected $descripcion;


	public function getConsecutivo_tipoBeca(){
		return $this->consecutivo_TipoBeca;
	}
	public function getDescripcion(){
		return $this->descripcion;
    }

	//Establecer valores
	public function setConsecutivo_tipoBeca($id_tipoBeca){
		$this->consecutivo_TipoBeca = $id_tipoBeca;
	}
	public function setDescripcion($descripcionTipoBeca){
		return $this->descripcion = $descripcionTipoBeca;
	}
	
}