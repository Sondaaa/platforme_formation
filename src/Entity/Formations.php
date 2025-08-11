<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Formations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $objectifs = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $modalite = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $dureeHeures = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $casPratiques = null;

    #[ORM\Column(type: 'boolean')]
    private bool $testValidation = false;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $prix = null;

    // Ajout des colonnes photo et video
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $video = null;

    // ... getters et setters existants ...

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;
        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;
        return $this;
    }

    // Reste de la classe (getters/setters déjà présents)
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getObjectifs(): ?string
    {
        return $this->objectifs;
    }

    public function setObjectifs(?string $objectifs): self
    {
        $this->objectifs = $objectifs;
        return $this;
    }

    public function getModalite(): ?string
    {
        return $this->modalite;
    }

    public function setModalite(?string $modalite): self
    {
        $this->modalite = $modalite;
        return $this;
    }

    public function getDureeHeures(): ?int
    {
        return $this->dureeHeures;
    }

    public function setDureeHeures(?int $dureeHeures): self
    {
        $this->dureeHeures = $dureeHeures;
        return $this;
    }

    public function getCasPratiques(): ?int
    {
        return $this->casPratiques;
    }

    public function setCasPratiques(?int $casPratiques): self
    {
        $this->casPratiques = $casPratiques;
        return $this;
    }

    public function getTestValidation(): bool
    {
        return $this->testValidation;
    }

    public function setTestValidation(bool $testValidation): self
    {
        $this->testValidation = $testValidation;
        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;
        return $this;
    }
}
