<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CargaComplejidadAcumulada
 * @ORM\Entity(repositoryClass="App\Repository")
 * @ORM\Table(name="carga_complejidad_acumulada", indexes={@ORM\Index(name="carga_empleado_id_empleado_id", columns={"empleado_id"}), @ORM\Index(name="carga_soporte_tipo_id_soporte_tipo_id", columns={"soporte_tipo_id"})})
 * @ORM\Entity
 */
class CargaComplejidadAcumulada
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
     * @var int
     *
     * @ORM\Column(name="estado", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $fecha = 'current_timestamp()';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */

    /**
     * @var \SoporteTipo
     *
     * @ORM\ManyToOne(targetEntity="SoporteTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="soporte_tipo_id", referencedColumnName="id")
     * })
     */
    private $soporteTipo;

    /**
     * @var \Empleado
     *
     * @ORM\ManyToOne(targetEntity="Empleado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empleado_id", referencedColumnName="id")
     * })
     */
    private $empleado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }


    public function getSoporteTipo(): ?SoporteTipo
    {
        return $this->soporteTipo;
    }

    public function setSoporteTipo(?SoporteTipo $soporteTipo): self
    {
        $this->soporteTipo = $soporteTipo;

        return $this;
    }

    public function getEmpleado(): ?Empleado
    {
        return $this->empleado;
    }

    public function setEmpleado(?Empleado $empleado): self
    {
        $this->empleado = $empleado;

        return $this;
    }


}
