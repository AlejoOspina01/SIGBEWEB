<?php

use Doctrine\ORM\Mapping as ORM;

// src/Product.php

/** 
 *@ORM\Entity
 *@ORM\Table(name="documentoconvocatoria")
 */
class DocumentoConvocatoria
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Documentos", inversedBy="DocumentoHasPostulacion")
     * @ORM\JoinColumn(name="documentoid", referencedColumnName="iddocumento",nullable=false)
     */
    protected $documento;
    /**
     * @ORM\Id    
     * @ORM\ManyToOne(targetEntity="Convocatorias", inversedBy="DocumentoHasConvocatoria", cascade={"persist", "remove" })
     * @ORM\JoinColumn(name="convocatoriaid", referencedColumnName="consecutivo_convocatoria",nullable=false)
     */
    protected $convocatoria;

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
    public function getConvocatoria()
    {
        return $this->convocatoria;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }
    public function setConvocatoria($convocatoria)
    {
        $this->convocatoria = $convocatoria;
    }
}
