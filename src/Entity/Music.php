<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MusicRepository")
 */
class Music
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
    private $title;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\File(
     *      maxSize="8192k",
     *      maxSizeMessage="Le fichier est trop volumineux. Sa taille ne doit pas dépasser 8Mo.",
     *      mimeTypes={"audio/mpeg"},
     *      mimeTypesMessage="Le type du fichier est invalide. Les types autorisés sont 'mp3' ou 'mp4'."
     * )
     */
    private $file;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $publication_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publication_date;
    }

    public function setPublicationDate(\DateTimeInterface $publication_date): self
    {
        $this->publication_date = $publication_date;

        return $this;
    }
}
