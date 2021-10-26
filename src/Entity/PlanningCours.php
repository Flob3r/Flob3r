<?php

namespace App\Entity;

use App\Repository\PlanningCoursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanningCoursRepository::class)
 */
class PlanningCours
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
    private $Annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Mois;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Semaine;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Jour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Aprem;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Matin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?string
    {
        return $this->Annee;
    }

    public function setAnnee(string $Annee): self
    {
        $this->Annee = $Annee;

        return $this;
    }

    public function getMois(): ?string
    {
        return $this->Mois;
    }

    public function setMois(string $Mois): self
    {
        $this->Mois = $Mois;

        return $this;
    }

    public function getSemaine(): ?string
    {
        return $this->Semaine;
    }

    public function setSemaine(string $Semaine): self
    {
        $this->Semaine = $Semaine;

        return $this;
    }

    public function getJour(): ?string
    {
        return $this->Jour;
    }

    public function setJour(string $Jour): self
    {
        $this->Jour = $Jour;

        return $this;
    }

    public function getAprem(): ?string
    {
        return $this->Aprem;
    }

    public function setAprem(string $Aprem): self
    {
        $this->Aprem = $Aprem;

        return $this;
    }

    public function getMatin(): ?string
    {
        return $this->Matin;
    }

    public function setMatin(string $Matin): self
    {
        $this->Matin = $Matin;

        return $this;
    }
}
