<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRepository")
 */
class Film
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resume;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_sortie;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $production;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $realisateur;

    /**
     * @var ArrayCollection
     * @ORM\ManyToOne(targetEntity="App\Entity\Acteur", inversedBy="films", cascade={"persist"})
     */
    private $acteurs;
    /**
     * @var ArrayCollection
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre", inversedBy="films", cascade={"persist"})
     *
     */
    private $genres;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Affiche", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $affiche;

    public function __construct()
    {
        $this->genres = new ArrayCollection();
        $this->acteurs = new ArrayCollection();
    }

    public function getId()
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

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->date_sortie;
    }

    public function setDateSortie(?\DateTimeInterface $date_sortie): self
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }

    public function getProduction(): ?string
    {
        return $this->production;
    }

    public function setProduction(string $production): self
    {
        $this->production = $production;

        return $this;
    }

    public function getRealisateur(): ?string
    {
        return $this->realisateur;
    }

    public function setRealisateur(?string $realisateur): self
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getActeurs(): ArrayCollection
    {
        return $this->acteurs;
    }

    /**
     * @param ArrayCollection $acteurs
     */
    public function setActeurs(ArrayCollection $acteurs): void
    {
        $this->acteurs = $acteurs;
    }

    /**
     * @return ArrayCollection
     */
    public function getGenres(): ArrayCollection
    {
        return $this->genres;
    }

    /**
     * @param ArrayCollection $genres
     */
    public function setGenres(ArrayCollection $genres): void
    {
        $this->genres = $genres;
    }

    /**
     * @return mixed
     */
    public function getAffiche()
    {
        return $this->affiche;
    }

    /**
     * @param mixed $affiche
     */
    public function setAffiche($affiche): void
    {
        $this->affiche = $affiche;
    }



}
