<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity()
 * @ORM\Table(name="linka")
 */
class Linka
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", options={"unsigned":true})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var string
     */
    private $nazov;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Uep", mappedBy="linka")
     *
     * @var Uep[]
     */
    private $ueps;


    public function __construct()
    {
        $this->ueps = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get nazov
     *
     * @return string
     */
    public function getNazov(): string
    {
        return $this->nazov;
    }

    /**
     * Set nazov
     *
     * @param string $nazov
     *
     * @return Linka
     */
    public function setNazov(string $nazov): self
    {
        $this->nazov = $nazov;

        return $this;
    }

    /**
     * Get ueps
     *
     * @return Uep[]|Collection
     */
    public function getUeps(): Collection
    {
        return $this->ueps;
    }

    /**
     * Add uep
     *
     * @param Uep $uep
     *
     * @return Linka
     */
    public function addUep(Uep $uep): self
    {
        if (!$this->ueps->contains($uep)) {
            $this->ueps[] = $uep;
            $uep->setLinka($this);
        }

        return $this;
    }

    /**
     * Remove uep
     *
     * @param Uep $uep
     *
     * @return Linka
     */
    public function removeUep(Uep $uep): self
    {
        $this->ueps->removeElement($uep);

        return $this;
    }
}
