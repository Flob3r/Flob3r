<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
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
    private $intitule;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity=Intervenant::class, inversedBy="setMatiere")
     */
    private $fk_intervenant;

    /**
     * @ORM\ManyToMany(targetEntity=Calendrier::class, mappedBy="fk_matiere")
     */
    private $setMatiere;

    public function __construct()
    {
        $this->setMatiere = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->intitule;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getFkIntervenant(): ?Intervenant
    {
        return $this->fk_intervenant;
    }

    public function setFkIntervenant(?Intervenant $fk_intervenant): self
    {
        $this->fk_intervenant = $fk_intervenant;

        return $this;
    }

    /**
     * @return Collection|Calendrier[]
     */
    public function getSetMatiere(): Collection
    {
        return $this->setMatiere;
    }

    public function addSetMatiere(Calendrier $setMatiere): self
    {
        if (!$this->setMatiere->contains($setMatiere)) {
            $this->setMatiere[] = $setMatiere;
            $setMatiere->addFkMatiere($this);
        }

        return $this;
    }

    public function removeSetMatiere(Calendrier $setMatiere): self
    {
        if ($this->setMatiere->removeElement($setMatiere)) {
            $setMatiere->removeFkMatiere($this);
        }

        return $this;
    }
}
