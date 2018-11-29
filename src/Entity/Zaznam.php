<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity()
 * @ORM\Table(name="zaznam")
 *
 */
class Zaznam
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var \DateTime|null
     */
    private $zaznamenany;

    /**
     * @ORM\Column(type="date")
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var \DateTime
     */
    private $den;

    /**
     * @ORM\Column(type="string", length=1)
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var string
     */
    private $zmena;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $nadcas = 0;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Uep")
     * @ORM\JoinColumn(name="uep_id", referencedColumnName="id")
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var Uep
     */
    private $uep;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $pocetVyrobenych = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $sumaPracovnikovMonitor = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $sumaPracovnikovOperator = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $pnLekarMonitor = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $pnLekarOperator = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $dovolenkaNvMonitor = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $dovolenkaNvOperator = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $ineMonitor = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $ineOperator = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $skolenieMonitor = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $skolenieOperator = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $pozicanyMonitor = 0;

    /**
     * @ORM\Column(type="integer",options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $pozicanyOperator = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $vypozicanyMonitor = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $vypozicanyOperator = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $nadcasDruhaZmenaMonitor = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $nadcasDruhaZmenaOperator = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $neobsadeneModulyMonitor = 0;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $neobsadeneModulyOperator = 0;

    /**
     * @ORM\Column(type="text", options={"default":""})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var string
     */
    private $zastaveniaFabInfo = "";

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $zastaveniaFabPocet = 0;

    /**
     * @ORM\Column(type="text", options={"default":""})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var string
     */
    private $udrzbaInfo = "";

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $udrzbaPocet = 0;

    /**
     * @ORM\Column(type="text", options={"default":""})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var string
     */
    private $logistikaInfo = "";

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $logistikaPocet = 0;

    /**
     * @ORM\Column(type="text", options={"default":""})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var string
     */
    private $saturaciaInfo = "";

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $saturaciaPocet = 0;

    /**
     * @ORM\Column(type="text", options={"default":""})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var string
     */
    private $nedostatokInfo = "";

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $nedostatokPocet = 0;

    /**
     * @ORM\Column(type="text", options={"default":""})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var string
     */
    private $pocetZastaveniInfo = "";

    /**
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     *
     * @Serializer\Groups({"zaznam"})
     *
     * @var integer
     */
    private $pocetZastaveni = 0;

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
     * Get zaznamenany
     *
     * @return \DateTime|null
     */
    public function getZaznamenany(): ?\DateTime
    {
        return $this->zaznamenany;
    }

    /**
     * Set zaznamenany
     *
     * @param \DateTime|null $zaznamenany
     *
     * @return Zaznam
     */
    public function setZaznamenany(?\DateTime $zaznamenany): self
    {
        if ($zaznamenany == null) {
            $this->zaznamenany = null;
        } else {
            $this->zaznamenany = new \DateTime($zaznamenany->format('Y-m-d H:i:s'));
        }

        return $this;
    }

    /**
     * Get den
     *
     * @return \DateTime
     */
    public function getDen(): \DateTime
    {
        return $this->den;
    }

    /**
     * Set den
     *
     * @param \DateTime $den
     *
     * @return Zaznam
     */
    public function setDen(\DateTime $den): self
    {
        $this->den = new \DateTime($den->format('Y-m-d'));

        return $this;
    }

    /**
     * Get zmena
     *
     * @return string
     */
    public function getZmena(): string
    {
        return $this->zmena;
    }

    /**
     * Set zmena
     *
     * @param string $zmena
     *
     * @return Zaznam
     */
    public function setZmena(string $zmena): self
    {
        $this->zmena = $zmena;

        return $this;
    }

    /**
     * Get nadcas
     *
     * @return int
     */
    public function getNadcas(): int
    {
        return $this->nadcas;
    }

    /**
     * Set nadcas
     *
     * @param int $nadcas
     *
     * @return Zaznam
     */
    public function setNadcas(int $nadcas): self
    {
        $this->nadcas = $nadcas;

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
     * @return Zaznam
     */
    public function setUep(Uep $uep): self
    {
        $this->uep = $uep;

        return $this;
    }

    /**
     * Get pocetVyrobenych
     *
     * @return int
     */
    public function getPocetVyrobenych(): int
    {
        return $this->pocetVyrobenych;
    }

    /**
     * Set pocetVyrobenych
     *
     * @param int $pocetVyrobenych
     *
     * @return Zaznam
     */
    public function setPocetVyrobenych(int $pocetVyrobenych): self
    {
        $this->pocetVyrobenych = $pocetVyrobenych;

        return $this;
    }

    /**
     * Get sumaPracovnikovMonitor
     *
     * @return int
     */
    public function getSumaPracovnikovMonitor(): int
    {
        return $this->sumaPracovnikovMonitor;
    }

    /**
     * Set sumaPracovnikovMonitor
     *
     * @param int $sumaPracovnikovMonitor
     *
     * @return Zaznam
     */
    public function setSumaPracovnikovMonitor(int $sumaPracovnikovMonitor): self
    {
        $this->sumaPracovnikovMonitor = $sumaPracovnikovMonitor;

        return $this;
    }

    /**
     * Get sumaPracovnikovOperator
     *
     * @return int
     */
    public function getSumaPracovnikovOperator(): int
    {
        return $this->sumaPracovnikovOperator;
    }

    /**
     * Set sumaPracovnikovOperator
     *
     * @param int $sumaPracovnikovOperator
     *
     * @return Zaznam
     */
    public function setSumaPracovnikovOperator(int $sumaPracovnikovOperator): self
    {
        $this->sumaPracovnikovOperator = $sumaPracovnikovOperator;

        return $this;
    }

    /**
     * Get pnLekarMonitor
     *
     * @return int
     */
    public function getPnLekarMonitor(): int
    {
        return $this->pnLekarMonitor;
    }

    /**
     * Set pnLekarMonitor
     *
     * @param int $pnLekarMonitor
     *
     * @return Zaznam
     */
    public function setPnLekarMonitor(int $pnLekarMonitor): self
    {
        $this->pnLekarMonitor = $pnLekarMonitor;

        return $this;
    }

    /**
     * Get pnLekarOperator
     *
     * @return int
     */
    public function getPnLekarOperator(): int
    {
        return $this->pnLekarOperator;
    }

    /**
     * Set pnLekarOperator
     *
     * @param int $pnLekarOperator
     *
     * @return Zaznam
     */
    public function setPnLekarOperator(int $pnLekarOperator): self
    {
        $this->pnLekarOperator = $pnLekarOperator;

        return $this;
    }

    /**
     * Get dovolenkaNvMonitor
     *
     * @return int
     */
    public function getDovolenkaNvMonitor(): int
    {
        return $this->dovolenkaNvMonitor;
    }

    /**
     * Set dovolenkaNvMonitor
     *
     * @param int $dovolenkaNvMonitor
     *
     * @return Zaznam
     */
    public function setDovolenkaNvMonitor(int $dovolenkaNvMonitor): self
    {
        $this->dovolenkaNvMonitor = $dovolenkaNvMonitor;

        return $this;
    }

    /**
     * Get dovolenkaNvOperator
     *
     * @return int
     */
    public function getDovolenkaNvOperator(): int
    {
        return $this->dovolenkaNvOperator;
    }

    /**
     * Set dovolenkaNvOperator
     *
     * @param int $dovolenkaNvOperator
     *
     * @return Zaznam
     */
    public function setDovolenkaNvOperator(int $dovolenkaNvOperator): self
    {
        $this->dovolenkaNvOperator = $dovolenkaNvOperator;

        return $this;
    }

    /**
     * Get ineMonitor
     *
     * @return int
     */
    public function getIneMonitor(): int
    {
        return $this->ineMonitor;
    }

    /**
     * Set ineMonitor
     *
     * @param int $ineMonitor
     *
     * @return Zaznam
     */
    public function setIneMonitor(int $ineMonitor): self
    {
        $this->ineMonitor = $ineMonitor;

        return $this;
    }

    /**
     * Get ineOperator
     *
     * @return int
     */
    public function getIneOperator(): int
    {
        return $this->ineOperator;
    }

    /**
     * Set ineOperator
     *
     * @param int $ineOperator
     *
     * @return Zaznam
     */
    public function setIneOperator(int $ineOperator): self
    {
        $this->ineOperator = $ineOperator;

        return $this;
    }

    /**
     * Get skolenieMonitor
     *
     * @return int
     */
    public function getSkolenieMonitor(): int
    {
        return $this->skolenieMonitor;
    }

    /**
     * Set skolenieMonitor
     *
     * @param int $skolenieMonitor
     *
     * @return Zaznam
     */
    public function setSkolenieMonitor(int $skolenieMonitor): self
    {
        $this->skolenieMonitor = $skolenieMonitor;

        return $this;
    }

    /**
     * Get skolenieOperator
     *
     * @return int
     */
    public function getSkolenieOperator(): int
    {
        return $this->skolenieOperator;
    }

    /**
     * Set skolenieOperator
     *
     * @param int $skolenieOperator
     *
     * @return Zaznam
     */
    public function setSkolenieOperator(int $skolenieOperator): self
    {
        $this->skolenieOperator = $skolenieOperator;

        return $this;
    }

    /**
     * Get pozicanyMonitor
     *
     * @return int
     */
    public function getPozicanyMonitor(): int
    {
        return $this->pozicanyMonitor;
    }

    /**
     * Set pozicanyMonitor
     *
     * @param int $pozicanyMonitor
     *
     * @return Zaznam
     */
    public function setPozicanyMonitor(int $pozicanyMonitor): self
    {
        $this->pozicanyMonitor = $pozicanyMonitor;

        return $this;
    }

    /**
     * Get pozicanyOperator
     *
     * @return int
     */
    public function getPozicanyOperator(): int
    {
        return $this->pozicanyOperator;
    }

    /**
     * Set pozicanyOperator
     *
     * @param int $pozicanyOperator
     *
     * @return Zaznam
     */
    public function setPozicanyOperator(int $pozicanyOperator): self
    {
        $this->pozicanyOperator = $pozicanyOperator;

        return $this;
    }

    /**
     * Get vypozicanyMonitor
     *
     * @return int
     */
    public function getVypozicanyMonitor(): int
    {
        return $this->vypozicanyMonitor;
    }

    /**
     * Set vypozicanyMonitor
     *
     * @param int $vypozicanyMonitor
     *
     * @return Zaznam
     */
    public function setVypozicanyMonitor(int $vypozicanyMonitor): self
    {
        $this->vypozicanyMonitor = $vypozicanyMonitor;

        return $this;
    }

    /**
     * Get vypozicanyOperator
     *
     * @return int
     */
    public function getVypozicanyOperator(): int
    {
        return $this->vypozicanyOperator;
    }

    /**
     * Set vypozicanyOperator
     *
     * @param int $vypozicanyOperator
     *
     * @return Zaznam
     */
    public function setVypozicanyOperator(int $vypozicanyOperator): self
    {
        $this->vypozicanyOperator = $vypozicanyOperator;

        return $this;
    }

    /**
     * Get nadcasDruhaZmenaMonitor
     *
     * @return int
     */
    public function getNadcasDruhaZmenaMonitor(): int
    {
        return $this->nadcasDruhaZmenaMonitor;
    }

    /**
     * Set nadcasDruhaZmenaMonitor
     *
     * @param int $nadcasDruhaZmenaMonitor
     *
     * @return Zaznam
     */
    public function setNadcasDruhaZmenaMonitor(int $nadcasDruhaZmenaMonitor): self
    {
        $this->nadcasDruhaZmenaMonitor = $nadcasDruhaZmenaMonitor;

        return $this;
    }

    /**
     * Get nadcasDruhaZmenaOperator
     *
     * @return int
     */
    public function getNadcasDruhaZmenaOperator(): int
    {
        return $this->nadcasDruhaZmenaOperator;
    }

    /**
     * Set nadcasDruhaZmenaOperator
     *
     * @param int $nadcasDruhaZmenaOperator
     *
     * @return Zaznam
     */
    public function setNadcasDruhaZmenaOperator(int $nadcasDruhaZmenaOperator): self
    {
        $this->nadcasDruhaZmenaOperator = $nadcasDruhaZmenaOperator;

        return $this;
    }

    /**
     * Get neobsadeneModulyMonitor
     *
     * @return int
     */
    public function getNeobsadeneModulyMonitor(): int
    {
        return $this->neobsadeneModulyMonitor;
    }

    /**
     * Set neobsadeneModulyMonitor
     *
     * @param int $neobsadeneModulyMonitor
     *
     * @return Zaznam
     */
    public function setNeobsadeneModulyMonitor(int $neobsadeneModulyMonitor): self
    {
        $this->neobsadeneModulyMonitor = $neobsadeneModulyMonitor;

        return $this;
    }

    /**
     * Get neobsadeneModulyOperator
     *
     * @return int
     */
    public function getNeobsadeneModulyOperator(): int
    {
        return $this->neobsadeneModulyOperator;
    }

    /**
     * Set neobsadeneModulyOperator
     *
     * @param int $neobsadeneModulyOperator
     *
     * @return Zaznam
     */
    public function setNeobsadeneModulyOperator(int $neobsadeneModulyOperator): self
    {
        $this->neobsadeneModulyOperator = $neobsadeneModulyOperator;

        return $this;
    }

    /**
     * Get zastaveniaFabInfo
     *
     * @return string
     */
    public function getZastaveniaFabInfo(): string
    {
        return $this->zastaveniaFabInfo;
    }

    /**
     * Set zastaveniaFabInfo
     *
     * @param string $zastaveniaFabInfo
     *
     * @return Zaznam
     */
    public function setZastaveniaFabInfo(string $zastaveniaFabInfo): self
    {
        $this->zastaveniaFabInfo = $zastaveniaFabInfo;

        return $this;
    }

    /**
     * Get zastaveniaFabPocet
     *
     * @return int
     */
    public function getZastaveniaFabPocet(): int
    {
        return $this->zastaveniaFabPocet;
    }

    /**
     * Set zastaveniaFabPocet
     *
     * @param int $zastaveniaFabPocet
     *
     * @return Zaznam
     */
    public function setZastaveniaFabPocet(int $zastaveniaFabPocet): self
    {
        $this->zastaveniaFabPocet = $zastaveniaFabPocet;

        return $this;
    }

    /**
     * Get udrzbaInfo
     *
     * @return string
     */
    public function getUdrzbaInfo(): string
    {
        return $this->udrzbaInfo;
    }

    /**
     * Set udrzbaInfo
     *
     * @param string $udrzbaInfo
     *
     * @return Zaznam
     */
    public function setUdrzbaInfo(string $udrzbaInfo): self
    {
        $this->udrzbaInfo = $udrzbaInfo;

        return $this;
    }

    /**
     * Get udrzbaPocet
     *
     * @return int
     */
    public function getUdrzbaPocet(): int
    {
        return $this->udrzbaPocet;
    }

    /**
     * Set udrzbaPocet
     *
     * @param int $udrzbaPocet
     *
     * @return Zaznam
     */
    public function setUdrzbaPocet(int $udrzbaPocet): self
    {
        $this->udrzbaPocet = $udrzbaPocet;

        return $this;
    }

    /**
     * Get logistikaInfo
     *
     * @return string
     */
    public function getLogistikaInfo(): string
    {
        return $this->logistikaInfo;
    }

    /**
     * Set logistikaInfo
     *
     * @param string $logistikaInfo
     *
     * @return Zaznam
     */
    public function setLogistikaInfo(string $logistikaInfo): self
    {
        $this->logistikaInfo = $logistikaInfo;

        return $this;
    }

    /**
     * Get logistikaPocet
     *
     * @return int
     */
    public function getLogistikaPocet(): int
    {
        return $this->logistikaPocet;
    }

    /**
     * Set logistikaPocet
     *
     * @param int $logistikaPocet
     *
     * @return Zaznam
     */
    public function setLogistikaPocet(int $logistikaPocet): self
    {
        $this->logistikaPocet = $logistikaPocet;

        return $this;
    }

    /**
     * Get saturaciaInfo
     *
     * @return string
     */
    public function getSaturaciaInfo(): string
    {
        return $this->saturaciaInfo;
    }

    /**
     * Set saturaciaInfo
     *
     * @param string $saturaciaInfo
     *
     * @return Zaznam
     */
    public function setSaturaciaInfo(string $saturaciaInfo): self
    {
        $this->saturaciaInfo = $saturaciaInfo;

        return $this;
    }

    /**
     * Get saturaciaPocet
     *
     * @return int
     */
    public function getSaturaciaPocet(): int
    {
        return $this->saturaciaPocet;
    }

    /**
     * Set saturaciaPocet
     *
     * @param int $saturaciaPocet
     *
     * @return Zaznam
     */
    public function setSaturaciaPocet(int $saturaciaPocet): self
    {
        $this->saturaciaPocet = $saturaciaPocet;

        return $this;
    }

    /**
     * Get nedostatokInfo
     *
     * @return string
     */
    public function getNedostatokInfo(): string
    {
        return $this->nedostatokInfo;
    }

    /**
     * Set nedostatokInfo
     *
     * @param string $nedostatokInfo
     *
     * @return Zaznam
     */
    public function setNedostatokInfo(string $nedostatokInfo): self
    {
        $this->nedostatokInfo = $nedostatokInfo;

        return $this;
    }

    /**
     * Get nedostatokPocet
     *
     * @return int
     */
    public function getNedostatokPocet(): int
    {
        return $this->nedostatokPocet;
    }

    /**
     * Set nedostatokPocet
     *
     * @param int $nedostatokPocet
     *
     * @return Zaznam
     */
    public function setNedostatokPocet(int $nedostatokPocet): self
    {
        $this->nedostatokPocet = $nedostatokPocet;

        return $this;
    }

    /**
     * Get pocetZastaveniInfo
     *
     * @return string
     */
    public function getPocetZastaveniInfo(): string
    {
        return $this->pocetZastaveniInfo;
    }

    /**
     * Set pocetZastaveniInfo
     *
     * @param string $pocetZastaveniInfo
     *
     * @return Zaznam
     */
    public function setPocetZastaveniInfo(string $pocetZastaveniInfo): self
    {
        $this->pocetZastaveniInfo = $pocetZastaveniInfo;

        return $this;
    }

    /**
     * Get pocetZastaveni
     *
     * @return int
     */
    public function getPocetZastaveni(): int
    {
        return $this->pocetZastaveni;
    }

    /**
     * Set pocetZastaveni
     *
     * @param int $pocetZastaveni
     *
     * @return Zaznam
     */
    public function setPocetZastaveni(int $pocetZastaveni): self
    {
        $this->pocetZastaveni = $pocetZastaveni;

        return $this;
    }
}
