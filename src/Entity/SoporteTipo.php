<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * SoporteTipo
 *
 * @ORM\Table(name="soporte_tipo")
 * @ORM\Entity
 */
class SoporteTipo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", length=65535, nullable=false)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="complejidad", type="integer", nullable=false)
     */
    private $complejidad;


    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of descripcion
     *
     * @return  string
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @param  string  $descripcion
     *
     * @return  self
     */ 
    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of complejidad
     *
     * @return  int
     */ 
    public function getComplejidad()
    {
        return $this->complejidad;
    }

    /**
     * Set the value of complejidad
     *
     * @param  int  $complejidad
     *
     * @return  self
     */ 
    public function setComplejidad(int $complejidad)
    {
        $this->complejidad = $complejidad;

        return $this;
    }
}
