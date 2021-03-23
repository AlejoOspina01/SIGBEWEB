<?php

use Doctrine\ORM\Mapping as ORM;


/** 
*@ORM\Entity
*@ORM\Table(name="fuenteingreso")
*/
class FuenteIngreso
{
    /** 
    *@ORM\Id
    *@ORM\Column(type="integer")
    *@ORM\GeneratedValue
    */
    protected $idfuenteingreso;
    /**
	 * @ORM\ManyToOne(targetEntity="InformacionGeneral", inversedBy="FuenteIngreso", cascade={"persist", "remove" })
	 * @ORM\JoinColumn(name="informacionfuente", referencedColumnName="idinformaciongeneral",nullable=true)
	 */
    private $informacionfuente;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $nombre;
    /**
	 * @ORM\ManyToOne(targetEntity="TipoNecesidad", inversedBy="FuenteIngreso", cascade={"persist", "remove" })
	 * @ORM\JoinColumn(name="tiponecesidad", referencedColumnName="idtiponecesidad",nullable=true)
	 */
    protected $tiponecesidad;

    //Getters
    public function getIdFuenteIngreso(){
    	return $this->idfuenteingreso;
    }
    public function getInformacionFuente(){
    	return $this->informacionfuente;
    }
    public function getNombre(){
    	return $this->nombre;
    }
    
	//Establecer valores
    public function setNecesidad($idfuenteingreso)
    {
        $this->idfuenteingreso = $idfuenteingreso;
    }
    public function setInformacionFuente($informacionfuente)
    {
        $this->informacionfuente = $informacionfuente;
    }
    public function setNombre($nombre)
    {
    	 $this->nombre = $nombre;
    }
     
}