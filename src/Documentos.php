<?php

use Doctrine\ORM\Mapping as ORM;

// src/Documentos.php

/** 
*@ORM\Entity
*@ORM\Table(name="documentos")
*/
class Documentos
{
/** 
    *@ORM\Id
    *@ORM\Column(type="integer")
    *@ORM\GeneratedValue
*/
    protected $iddocumento;
     /** 
    *@ORM\Column(type="string") 
    */
    protected $descripcion;
    /**
    *  
    *
    * @ORM\OneToMany(targetEntity="DocumentoPostulacion", mappedBy="Documentos", cascade={"all"})
    *
    */
    private $DocumentoHasPostulacion;
    /**
    *  
    *
    * @ORM\OneToMany(targetEntity="DocumentoConvocatoria", mappedBy="Documentos", cascade={"all"})
    *
    */
    private $DocumentosHasConvocatoria;


	public function getIdDocumento(){
		return $this->iddocumento;
	}
	public function getDescripcion(){
		return $this->descripcion;
    }

	//Establecer valores
	public function setIdDocumento($iddocumento){
		$this->iddocumento = $iddocumento;
	}
	public function setDescripcion($descripcionDocumento){
		return $this->descripcion = $descripcionDocumento;
	}
	
}