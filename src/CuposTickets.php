<?php

use Doctrine\ORM\Mapping as ORM;

// src/Roles.php

/** 
*@ORM\Entity
*@ORM\Table(name="cupostickets")
*/
class CuposTickets
{
/** 
    *@ORM\Id
    *@ORM\Column(type="integer")
    *@ORM\GeneratedValue
*/
protected $consecutivo_cupostickets;
    /** 
     *@ORM\Column(type="date") 
     */
    protected $fechaasignacion;

     /** 
    *@ORM\Column(type="integer") 
    */
     protected $cupostotal;

    /** 
    *@ORM\Column(type="integer") 
    */
    protected $cuposdisponibles;    


    public function getConsecutivo_cupostickets(){
    	return $this->consecutivo_cupostickets;
    }
    public function getFechaAsignacion(){
    	return $this->fechaasignacion;
    }
    public function getCuposTotales(){
    	return $this->cupostotal;
    }
    public function getCuposDisponibles(){
    	return $this->cuposdisponibles;
    }

	//Establecer valores
    public function setConsecutivo_cupostickets($consecutivo_cupostickets){
    	$this->consecutivo_cupostickets = $consecutivo_cupostickets;
    }
    public function setFechaAsignacion($fechaasignacion){
    	return $this->fechaasignacion = $fechaasignacion;
    }
    public function setCuposTotales($cupostotal){
    	$this->cupostotal = $cupostotal;
    }
    public function setCuposDisponibles($cuposdisponibles){
    	return $this->cuposdisponibles = $cuposdisponibles;
    }

}