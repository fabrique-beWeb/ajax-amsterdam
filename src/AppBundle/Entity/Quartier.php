<?php

namespace AppBundle\Entity;

use JsonSerializable;
use Doctrine\ORM\Mapping as ORM;
/**
 * Quartier
 *
 * @ORM\Table(name="quartier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuartierRepository")
 */
class Quartier implements JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="nbHabitants", type="integer")
     */
    private $nbHabitants;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Quartier
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nbHabitants
     *
     * @param integer $nbHabitants
     *
     * @return Quartier
     */
    public function setNbHabitants($nbHabitants)
    {
        $this->nbHabitants = $nbHabitants;

        return $this;
    }

    /**
     * Get nbHabitants
     *
     * @return int
     */
    public function getNbHabitants()
    {
        return $this->nbHabitants;
    }

    public function jsonSerialize() {
        return array(
            'nom' => $this->nom,
            'nbHabitant' => $this->nbHabitants
        );
    }

}

