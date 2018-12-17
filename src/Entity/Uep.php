<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity()
 * @ORM\Table(name="uep")
 */
class Uep
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", options={"unsigned"})
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Linka", inversedBy="ueps")
     * @ORM\JoinColumn(name="linka_id", referencedColumnName="id", nullable=false)
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var Linka
     */
    private $linka;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     *
     * @Serializer\Groups({"zaznam"})
     */
    private $pocetModulovMonitor;

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
     * @return Uep
     */
    public function setNazov(string $nazov): self
    {
        $this->nazov = $nazov;

        return $this;
    }

    /**
     * Get linka
     *
     * @return Linka
     */
    public function getLinka(): Linka
    {
        return $this->linka;
    }

    /**
     * Set linka
     *
     * @param Linka $linka
     *
     * @return Uep
     */
    public function setLinka(Linka $linka): self
    {
        $this->linka = $linka;

        return $this;
    }

    /**
     * Get pocetModulovMonitor
     *
     * @return int
     */
    public function getPocetModulovMonitor(): int
    {
        return $this->pocetModulovMonitor;
    }

    /**
     * Set pocetModulovMonitor
     *
     * @param int $pocetModulovMonitor
     *
     * @return Uep
     */
    public function setPocetModulovMonitor(int $pocetModulovMonitor): self
    {
        $this->pocetModulovMonitor = $pocetModulovMonitor;

        return $this;
    }
}
