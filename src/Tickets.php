<?php

use Doctrine\ORM\Mapping as ORM;


/** 
*@ORM\Entity
*@ORM\Table(name="tickets")
*/
class Tickets{
	/** 
    *@ORM\Id
    *@ORM\Column(type="integer")
    *@ORM\GeneratedValue
*/
    protected $consecutivoticket;
     /** 
     *@ORM\Column(type="datetime") 
     */
     protected $fechacompra;
	  /** 
     *@ORM\Column(type="integer") 
     */
      protected $valor;
     /** 
     *@ORM\Column(type="string") 
     */
     protected $estadoticket;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $tipoTicket;

    /**
	 * @ORM\ManyToOne(targetEntity="Usuarios", inversedBy="Tickets", cascade={"persist", "remove" })
	 * @ORM\JoinColumn(name="usuario_id", referencedColumnName="identificacion",nullable=true)
	 */
    protected $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="CuposTickets", inversedBy="Tickets", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="cupoticket_id", referencedColumnName="consecutivo_cupostickets",nullable=true)
     */
    protected $cupostickets;

    public function getConsecutivoTicket(){
      return $this->consecutivoticket;
  }

  public function getFechaCompra(){
      return $this->fechacompra;
  }

  public function getUsuario(){
      return $this->usuario;
  }
  public function getValor(){
      return $this->valor;
  }

  public function getEstado(){
      return $this->estadoticket;
  }

  public function getTipoTicket(){
    return $this->tipoTicket;
}

public function getCupostickets(){
    return $this->cupostickets;
}

    //Establecer valores 
public function setConsecutivoTicket($consecutivoticket){
  $this->consecutivoticket = $consecutivoticket;
}

public function setCupostickets($cupostickets){
  $this->cupostickets = $cupostickets;
}  

public function setFechaCompra($fechacompra){
  $this->fechacompra = $fechacompra;
} 

public function setValor($valor){
  $this->valor = $valor;
}

public function setEstado($estadoticket){
  $this->estadoticket = $estadoticket;
}

public function setUsuario($usuario){
    $this->usuario = $usuario;
}

public function setTipoTicket($tipoTicket){
    $this->tipoTicket = $tipoTicket;
}

}
