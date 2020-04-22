<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoRepository")
 */
class Photo
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
    private $code;

    /**    public function __toString(): ?string
    {
        return $this->titre;
    }
     * @ORM\Column(type="datetime")
     */
    private $date_publication;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AlbumPhotos", inversedBy="photos")
     */
    private $album_photos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->date_publication;
    }

    public function setDatePublication(\DateTimeInterface $date_publication): self
    {
        $this->date_publication = $date_publication;

        return $this;
    }

    public function getAlbumPhotos(): ?AlbumPhotos
    {
        return $this->album_photos;
    }

    public function setAlbumPhotos(?AlbumPhotos $album_photos): self
    {
        $this->album_photos = $album_photos;

        return $this;
    }
    
    public function __toString(): ?string
    {
        return $this->titre;
    }
}
