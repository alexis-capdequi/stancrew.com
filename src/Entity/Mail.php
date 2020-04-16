<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MailRepository")
 */
class Mail
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
    private $objet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail_expediteur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone_expediteur;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_envoi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getMailExpediteur(): ?string
    {
        return $this->mail_expediteur;
    }

    public function setMailExpediteur(string $mail_expediteur): self
    {
        $this->mail_expediteur = $mail_expediteur;

        return $this;
    }

    public function getTelephoneExpediteur(): ?int
    {
        return $this->telephone_expediteur;
    }

    public function setTelephoneExpediteur(?int $telephone_expediteur): self
    {
        $this->telephone_expediteur = $telephone_expediteur;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->date_envoi;
    }

    public function setDateEnvoi(\DateTimeInterface $date_envoi): self
    {
        $this->date_envoi = $date_envoi;

        return $this;
    }
}
