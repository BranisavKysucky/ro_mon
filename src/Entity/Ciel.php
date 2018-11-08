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
     * @ORM\ManyToOne(targetEntity="App\Entity\Uep")
     * @ORM\JoinColumn(name="uep_id", referencedColumnName="id", nullable=false)
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var Uep
     */
    private $uep;

    /**
     * @ORM\Column(type="float", options={"unsigned":true})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var float
     */
    private $cielHodinovaVyroba;

    /**
     * @ORM\Column(type="float", options={"unsigned":true})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var float
     */
    private $cielRo;

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
     * Get uep
     *
     * @return Uep
     */
    public function getUep(): Uep
    {
        return $this->uep;
    }

    /**
     * Set uep
     *
     * @param Uep $uep
     *
     * @return Ciel
     */
    public function setUep(Uep $uep): self
    {
        $this->uep = $uep;

        return $this;
    }

    /**
     * Get cielHodinovaVyroba
     *
     * @return float
     */
    public function getCielHodinovaVyroba(): float
    {
        return $this->cielHodinovaVyroba;
    }

    /**
     * Set cielHodinovaVyroba
     *
     * @param float $cielHodinovaVyroba
     *
     * @return Ciel
     */
    public function setCielHodinovaVyroba(float $cielHodinovaVyroba): self
    {
        $this->cielHodinovaVyroba = $cielHodinovaVyroba;

        return $this;
    }

    /**
     * Get cielRo
     *
     * @return float
     */
    public function getCielRo(): float
    {
        return $this->cielRo;
    }

    /**
     * Set cielRo
     *
     * @param float $cielRo
     *
     * @return Ciel
     */
    public function setCielRo(float $cielRo): self
    {
        $this->cielRo = $cielRo;

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
