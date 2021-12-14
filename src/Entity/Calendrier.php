<?php

namespace App\Entity;

use App\Repository\CalendrierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CalendrierRepository::class)
 */
class Calendrier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomCours;

    /**
     * @ORM\Column(type="date")
     */
    private $DateStart;

    /**
     * @ORM\Column(type="time")
     */
    private $TimeStart;

    /**
     * @ORM\Column(type="date")
     */
    private $DateEnd;

    /**
     * @ORM\Column(type="time")
     */
    private $TimeEnd;

    /**
     * @ORM\ManyToMany(targetEntity=Intervenant::class, inversedBy="setCalendars")
     */
    private $fk_intervenant;

    /**
     * @ORM\ManyToMany(targetEntity=Matiere::class, inversedBy="setMatiere")
     */
    private $fk_matiere;

    public function __construct()
    {
        $this->fk_intervenant = new ArrayCollection();
        $this->fk_matiere = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->NomCours;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCours(): ?string
    {
        return $this->NomCours;
    }

    public function setNomCours(string $NomCours): self
    {
        $this->NomCours = $NomCours;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->DateStart;
    }

    public function setDateStart(\DateTimeInterface $DateStart): self
    {
        $this->DateStart = $DateStart;

        return $this;
    }

    public function getTimeStart(): ?\DateTimeInterface
    {
        return $this->TimeStart;
    }

    public function setTimeStart(\DateTimeInterface $TimeStart): self
    {
        $this->TimeStart = $TimeStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->DateEnd;
    }

    public function setDateEnd(\DateTimeInterface $DateEnd): self
    {
        $this->DateEnd = $DateEnd;

        return $this;
    }

    public function getTimeEnd(): ?\DateTimeInterface
    {
        return $this->TimeEnd;
    }

    public function setTimeEnd(\DateTimeInterface $TimeEnd): self
    {
        $this->TimeEnd = $TimeEnd;

        return $this;
    }

    /**
     * @return Collection|Intervenant[]
     */
    public function getFkIntervenant(): Collection
    {
        return $this->fk_intervenant;
    }

    public function addFkIntervenant(Intervenant $fkIntervenant): self
    {
        if (!$this->fk_intervenant->contains($fkIntervenant)) {
            $this->fk_intervenant[] = $fkIntervenant;
        }

        return $this;
    }

    public function removeFkIntervenant(Intervenant $fkIntervenant): self
    {
        $this->fk_intervenant->removeElement($fkIntervenant);

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getFkMatiere(): Collection
    {
        return $this->fk_matiere;
    }

    public function addFkMatiere(Matiere $fkMatiere): self
    {
        if (!$this->fk_matiere->contains($fkMatiere)) {
            $this->fk_matiere[] = $fkMatiere;
        }

        return $this;
    }

    public function removeFkMatiere(Matiere $fkMatiere): self
    {
        $this->fk_matiere->removeElement($fkMatiere);

        return $this;
    }
}
