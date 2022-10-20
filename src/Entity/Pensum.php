<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pensum
 *
 * @ORM\Table(name="pensum", indexes={@ORM\Index(name="usuario_id", columns={"usuario_id"}), @ORM\Index(name="materia_id", columns={"materia_id"})})
 * @ORM\Entity
 */
class Pensum
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="periodo", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $periodo = NULL;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @var \Materias
     *
     * @ORM\ManyToOne(targetEntity="Materias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="materia_id", referencedColumnName="id")
     * })
     */
    private $materia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeriodo(): ?int
    {
        return $this->periodo;
    }

    public function setPeriodo(?int $periodo): self
    {
        $this->periodo = $periodo;

        return $this;
    }

    public function getUsuario(): ?Usuarios
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuarios $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getMateria(): ?Materias
    {
        return $this->materia;
    }

    public function setMateria(?Materias $materia): self
    {
        $this->materia = $materia;

        return $this;
    }


}
