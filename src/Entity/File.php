<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FileRepository")
 * @Vich\Uploadable()
 */
class File
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \Symfony\Component\HttpFoundation\File\File|null
     * @Vich\UploadableField(mapping="participant_file", fileNameProperty="filename", mimeType="mimetype")
     */
    private $file;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mimetype;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Participant", inversedBy="files")
     */
    private $participant;

    public function __toString()
    {
        return $this->filename ?? '';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getMimetype(): ?string
    {
        return $this->mimetype;
    }

    public function setMimetype(string $mimetype): self
    {
        $this->mimetype = $mimetype;

        return $this;
    }

    public function getParticipant(): ?Participant
    {
        return $this->participant;
    }

    public function setParticipant(?Participant $participant): self
    {
        $this->participant = $participant;

        return $this;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File|null
     */
    public function getFile(): ?\Symfony\Component\HttpFoundation\File\File
    {
        return $this->file;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File|null $file
     * @return File
     */
    public function setFile(?\Symfony\Component\HttpFoundation\File\File $file): File
    {
        $this->file = $file;
        return $this;
    }


}
