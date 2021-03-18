<?php

use Doctrine\ORM\Mapping as ORM;

// src/Product.php

/** 
 *@ORM\Entity
 *@ORM\Table(name="documentopostulacion")
 */
class DocumentoPostulacion
{

    /**
     * @ORM\Id    
     * @ORM\ManyToOne(targetEntity="Documentos", inversedBy="DocumentoHasPostulacion")
     * @ORM\JoinColumn(name="documentoid", referencedColumnName="iddocumento",nullable=false)
     */
    protected $documento;
    /**
     * @ORM\Id    
     * @ORM\ManyToOne(targetEntity="Postulacion", inversedBy="DocumentoHasPostulacion", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="postulacionid", referencedColumnName="consecutivo_postulacion",nullable=false)
     */
    protected $postulacion;
    /** 
     *@ORM\Column(type="string") 
     */
    protected $archivodocumento;
    /** 
     *@ORM\Column(type="integer") 
     */
    protected $estado;

    public function __toString()
    {
        try {
            return $this->getCarrera()->getNombrecarrera();
        } catch (Exception $exception) {
            return '';
        }
    }

    public function getDocumento()
    {
        return $this->documento;
    }
    public function getPostulacion()
    {
        return $this->postulacion;
    }
    public function getArchivo()
    {
        return $this->archivodocumento;
    }
    public function getEstado()
    {
        return $this->estado;
    }


    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }
    public function setPostulacion($postulacion)
    {
        $this->postulacion = $postulacion;
    }
    public function setArchivo($archivodocumento)
    {
        $this->archivodocumento = $archivodocumento;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
}
