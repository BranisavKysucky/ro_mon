<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ciel")
 */
class Ciel
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
     * @ORM\Column(type="date")
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var \DateTime
     */
    private $platnostOd;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Linka")
     * @ORM\JoinColumn(name="linka_id", referencedColumnName="id", nullable=false)
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var Linka
     */
    private $linka;

    /**
     * @ORM\Column(type="float", options={"unsigned":true})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var float
     */
    private $cielTeoretickaVyroba;

    /**
     * @ORM\Column(type="float", options={"unsigned":true})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var float
     */
    private $cielRO;

    /**
     * @ORM\Column(type="float", options={"unsigned":true})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var float
     */
    private $cielEfektivita;

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
     * Get platnostOd
     *
     * @return \DateTime
     */
    public function getPlatnostOd(): \DateTime
    {
        return $this->platnostOd;
    }

    /**
     * Set platnostOd
     *
     * @param \DateTime $platnostOd
     *
     * @return Ciel
     */
    public function setPlatnostOd(\DateTime $platnostOd): self
    {
        $this->platnostOd = new \DateTime($platnostOd->format('Y-m-d'));

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
     * @return Ciel
     */
    public function setLinka(Linka $linka): self
    {
        $this->linka = $linka;

        return $this;
    }

    /**
     * Get cielTeoretickaVyroba
     *
     * @return float
     */
    public function getCielTeoretickaVyroba(): float
    {
        return $this->cielTeoretickaVyroba;
    }

    /**
     * Set cielTeoretickaVyroba
     *
     * @param float $cielTeoretickaVyroba
     *
     * @return Ciel
     */
    public function setCielTeoretickaVyroba(float $cielTeoretickaVyroba): self
    {
        $this->cielTeoretickaVyroba = $cielTeoretickaVyroba;

        return $this;
    }

    /**
     * Get cielRO
     *
     * @return float
     */
    public function getCielRO(): float
    {
        return $this->cielRO;
    }

    /**
     * Set cielRO
     *
     * @param float $cielRO
     *
     * @return Ciel
     */
    public function setCielRO(float $cielRO): self
    {
        $this->cielRO = $cielRO;

        return $this;
    }

    /**
     * Get cielEfektivita
     *
     * @return float
     */
    public function getCielEfektivita(): float
    {
        return $this->cielEfektivita;
    }

    /**
     * Set cielEfektivita
     *
     * @param float $cielEfektivita
     *
     * @return Ciel
     */
    public function setCielEfektivita(float $cielEfektivita): self
    {
        $this->cielEfektivita = $cielEfektivita;

        return $this;
    }
}
