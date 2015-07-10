<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="players")
 */

class Players
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    protected $name;
    /**
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    protected $surname;
    /**
     * @Assert\Date()
     * @ORM\JoinColumn(nullable=true)
     * @ORM\Column(type="date")
     */
    protected $birthYears;
    /**
     * @ORM\JoinColumn(nullable=true)
     * @Assert\GreaterThanOrEqual(
     *     value = 0
     * )
     * @ORM\Column(type="integer", length=2)
     */
    protected $shirtNumber;
    
    
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getSurname()
    {
        return $this->surname;
    }
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }
    
    public function getBirthYears()
    {
        return $this->birthYears;
    }
    public function setBirthYears($birthYears)
    {
        $this->birthYears = $birthYears;
    }
    
    public function getShirtNumber()
    {
        return $this->shirtNumber;
    }
    public function setShirtNumber($shirtNumber)
    {
        $this->shirtNumber = $shirtNumber;
    }
    
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
