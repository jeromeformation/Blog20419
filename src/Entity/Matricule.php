<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatriculeRepository")
 */
class Matricule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Personne", mappedBy="matricule", cascade={"persist", "remove"})
     */
    private $personne;

    public function __toString()
    {
        return 'Matricule ' . $this->numero;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        // set (or unset) the owning side of the relation if necessary
        $newMatricule = $personne === null ? null : $this;
        if ($newMatricule !== $personne->getMatricule()) {
            $personne->setMatricule($newMatricule);
        }

        return $this;
    }
}
