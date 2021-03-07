<?php

use Doctrine\ORM\Mapping as ORM;

// src/Roles.php

/** 
*@ORM\Entity
*@ORM\Table(name="anuncios")
*/
class Anuncios
{
/** 
    *@ORM\Id
    *@ORM\Column(type="integer")
    *@ORM\GeneratedValue
*/
protected $codigoanuncio;
     /** 
    *@ORM\Column(type="string") 
    */
     protected $link;
    /** 
     *@ORM\Column(type="date") 
     */
    protected $fechapublicacion;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $img;


    public function getCodigoAnuncio(){
    	return $this->codigoanuncio;
    }
    public function getLink(){
    	return $this->link;
    }
    public function getFechapublicacion(){
    	return $this->fechapublicacion;
    }
    public function getImg(){
    	return $this->img;
    }

	//Establecer valores
    public function setCodigoAnuncio($codigoanuncio){
    	$this->codigoanuncio = $codigoanuncio;
    }
    public function setLink($link){
    	$this->link = $link;
    }
    public function setFechapublicacion($fechapublicacion){
    	$this->fechapublicacion = $fechapublicacion;
    }
    public function setImg($img){
    	$this->img = $img;
    }

}