<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RendezVousRepository")
 */
class RendezVous
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetimeAt;

    /**
     * @ORM\Column(type="date")
     */
    private $dateAt;

    /**
     * @ORM\Column(type="time")
     */
    private $timeAt;

    /**
     * @ORM\Column(type="date")
     */
    private $yearAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDatetimeAt(): ?\DateTimeInterface
    {
        return $this->datetimeAt;
    }

    public function setDatetimeAt(\DateTimeInterface $datetimeAt): self
    {
        $this->datetimeAt = $datetimeAt;

        return $this;
    }

    public function getDateAt(): ?\DateTimeInterface
    {
        return $this->dateAt;
    }

    public function setDateAt(\DateTimeInterface $dateAt): self
    {
        $this->dateAt = $dateAt;

        return $this;
    }

    public function getTimeAt(): ?\DateTimeInterface
    {
        return $this->timeAt;
    }

    public function setTimeAt(\DateTimeInterface $timeAt): self
    {
        $this->timeAt = $timeAt;

        return $this;
    }

    public function getYearAt(): ?\DateTimeInterface
    {
        return $this->yearAt;
    }

    public function setYearAt(\DateTimeInterface $yearAt): self
    {
        $this->yearAt = $yearAt;

        return $this;
    }
}
