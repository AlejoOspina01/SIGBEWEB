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
    protected $cuposdisponiblesalmuerzo;    

    /** 
    *@ORM\Column(type="integer") 
    */
    protected $cuposdisponiblesrefrigerio;  


    public function getConsecutivo_cupostickets(){
    	return $this->consecutivo_cupostickets;
    }
    public function getFechaAsignacion(){
    	return $this->fechaasignacion;
    }
    public function getCuposDisponiblesAlmuerzos(){
    	return $this->cuposdisponiblesalmuerzo;
    }
    public function getCuposDisponiblesRefrigerio(){
        return $this->cuposdisponiblesrefrigerio;
    }

	//Establecer valores
    public function setConsecutivo_cupostickets($consecutivo_cupostickets){
    	$this->consecutivo_cupostickets = $consecutivo_cupostickets;
    }
    public function setFechaAsignacion($fechaasignacion){
    	return $this->fechaasignacion = $fechaasignacion;
    }
    public function setCuposDisponiblesAlmuerzo($cuposdisponiblesalmuerzo){
    	return $this->cuposdisponiblesalmuerzo = $cuposdisponiblesalmuerzo;
    }
    public function setCuposDisponiblesRefrigerio($cuposdisponiblesrefrigerio){
        return $this->cuposdisponiblesrefrigerio = $cuposdisponiblesrefrigerio;
    }

}