<?php

use Doctrine\ORM\Mapping as ORM;


/** 
*@ORM\Entity
*@ORM\Table(name="tiponecesidad")
*/
class TipoNecesidad 
{
    /** 
    *@ORM\Id
    *@ORM\Column(type="integer")
    *@ORM\GeneratedValue
    */
    protected $idtiponecesidad;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $nombre;

   
    //Getters
    public function getIdTipoNecesidad(){
    	return $this->idtiponecesidad;
    }
    public function getNombre(){
    	return $this->nombre;
    }
   
	//Establecer valores
    public function setIdTipoNecesidad($idtiponecesidad)
    {
        $this->idtiponecesidad = $idtiponecesidad;
    }
    public function setNombre($nombre)
    {
    	 $this->nombre = $nombre;
    }
     
}