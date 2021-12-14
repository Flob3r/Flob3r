<?php

namespace App\Entity;

use App\Repository\IntervenantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IntervenantRepository::class)
 */
class Intervenant
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="fk_intervenant")
     */
    private $setMatiere;

    /**
     * @ORM\ManyToMany(targetEntity=Calendrier::class, mappedBy="fk_intervenant")
     */
    private $setCalendars;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $specialite;

    public function __construct()
    {
        $this->setMatiere = new ArrayCollection();
        $this->setCalendars = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->nom;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getSetMatiere(): Collection
    {
        return $this->setMatiere;
    }

    public function addSetMatiere(Matiere $setMatiere): self
    {
        if (!$this->setMatiere->contains($setMatiere)) {
            $this->setMatiere[] = $setMatiere;
            $setMatiere->setFkIntervenant($this);
        }

        return $this;
    }

    public function removeSetMatiere(Matiere $setMatiere): self
    {
        if ($this->setMatiere->removeElement($setMatiere)) {
            // set the owning side to null (unless already changed)
            if ($setMatiere->getFkIntervenant() === $this) {
                $setMatiere->setFkIntervenant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Calendrier[]
     */
    public function getSetCalendars(): Collection
    {
        return $this->setCalendars;
    }

    public function addSetCalendar(Calendrier $setCalendar): self
    {
        if (!$this->setCalendars->contains($setCalendar)) {
            $this->setCalendars[] = $setCalendar;
            $setCalendar->addFkIntervenant($this);
        }

        return $this;
    }

    public function removeSetCalendar(Calendrier $setCalendar): self
    {
        if ($this->setCalendars->removeElement($setCalendar)) {
            $setCalendar->removeFkIntervenant($this);
        }

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(?string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }
}
