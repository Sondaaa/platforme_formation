<?php

namespace App\Entity;

use App\Entity\PieceJoint;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'formations')]
class Formations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $objectifs = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $modalite = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $dureeHeures = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $casPratiques = null;

    #[ORM\Column(type: 'boolean')]
    private bool $testValidation = false;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $prix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $video = null;

    #[ORM\OneToMany(mappedBy: 'formation', targetEntity: PieceJoint::class, cascade: ['persist', 'remove'])]
   
    private Collection $piecesJointes;

    public function __construct()
    {
        $this->piecesJointes = new ArrayCollection();
    }

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

    /** @return Collection<int, PieceJoint> */
    public function getPiecesJointes(): Collection
    {
        return $this->piecesJointes;
    }

    public function addPieceJointe(PieceJoint $pieceJoint): self
    {
        if (!$this->piecesJointes->contains($pieceJoint)) {
            $this->piecesJointes[] = $pieceJoint;
            $pieceJoint->setFormation($this);
        }
        return $this;
    }

    public function removePieceJointe(PieceJoint $pieceJoint): self
    {
        if ($this->piecesJointes->removeElement($pieceJoint)) {
            if ($pieceJoint->getFormation() === $this) {
                $pieceJoint->setFormation(null);
            }
        }
        return $this;
    }
}
