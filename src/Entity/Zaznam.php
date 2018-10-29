<?php
/**
 * Created by PhpStorm.
 * User: U555746
 * Date: 10/24/2018
 * Time: 12:53 PM
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="zaznam")
 */
class Zaznam
{


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $den;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linka;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zmena;

    /**
     * @ORM\Column(type="integer")
     */
    private $nadcas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uep;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $suma_pracovnikov_monitor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $suma_pracovnikov_operator;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pn_lekar_monitor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pn_lekar_operator;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dovolenka_nv_monitor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dovolenka_nv_operator;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ine_monitor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ine_operator;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $skolenie_monitor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $skolenie_operator;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pozicany_monitor;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $pozicany_operator;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $vypozicany_monitor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $vypozicany_operator;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nadcas_2_zmeny_monitor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nadcas_2_zmeny_operator;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zastavenia_text_fab;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $zastavenia_int_fab;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $udrzba_text;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $udrzba_int;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logistika_text;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $logistika_int;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $saturacia_text;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $saturacia_int;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nedostatok_text;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nedostatok_int;

//    /**
//     * @ORM\Column(type="float")
//     */
//    private $teoreticka_vyroba;
//
//    /**
//     * @ORM\Column(type="integer")
//     */
//    private $pocet_vyrobenych;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDen(): ?\DateTimeInterface
    {
        return $this->den;
    }

    public function setDen(\DateTimeInterface $den): self
    {
        $this->den = $den;

        return $this;
    }

    public function getLinka(): ?string
    {
        return $this->linka;
    }

    public function setLinka(string $linka): self
    {
        $this->linka = $linka;

        return $this;
    }

    public function getZmena(): ?string
    {
        return $this->zmena;
    }

    public function setZmena(string $zmena): self
    {
        $this->zmena = $zmena;

        return $this;
    }

    public function getNadcas(): ?int
    {
        return $this->nadcas;
    }

    public function setNadcas(int $nadcas): self
    {
        $this->nadcas = $nadcas;

        return $this;
    }

    public function getUep(): ?string
    {
        return $this->uep;
    }

    public function setUep(string $uep): self
    {
        $this->uep = $uep;

        return $this;
    }



    public function getSumaPracovnikovMonitor(): ?int
    {
        return $this->suma_pracovnikov_monitor;
    }

    public function setSumaPracovnikovMonitor(int $suma_pracovnikov_monitor): self
    {
        $this->suma_pracovnikov_monitor = $suma_pracovnikov_monitor;

        return $this;
    }

    public function getSumaPracovnikovOperator(): ?int
    {
        return $this->suma_pracovnikov_operator;
    }

    public function setSumaPracovnikovOperator(int $suma_pracovnikov_operator): self
    {
        $this->suma_pracovnikov_operator = $suma_pracovnikov_operator;

        return $this;
    }

    public function getPnLekarMonitor(): ?int
    {
        return $this->pn_lekar_monitor;
    }

    public function setPnLekarMonitor(int $pn_lekar_monitor): self
    {
        $this->pn_lekar_monitor = $pn_lekar_monitor;

        return $this;
    }

    public function getPnLekarOperator(): ?int
    {
        return $this->pn_lekar_operator;
    }

    public function setPnLekarOperator(int $pn_lekar_operator): self
    {
        $this->pn_lekar_operator = $pn_lekar_operator;

        return $this;
    }

    public function getDovolenkaNvMonitor(): ?int
    {
        return $this->dovolenka_nv_monitor;
    }

    public function setDovolenkaNvMonitor(int $dovolenka_nv_monitor): self
    {
        $this->dovolenka_nv_monitor = $dovolenka_nv_monitor;

        return $this;
    }

    public function getDovolenkaNvOperator(): ?int
    {
        return $this->dovolenka_nv_operator;
    }

    public function setDovolenkaNvOperator(int $dovolenka_nv_operator): self
    {
        $this->dovolenka_nv_operator = $dovolenka_nv_operator;

        return $this;
    }

    public function getIneMonitor(): ?int
    {
        return $this->ine_monitor;
    }

    public function setIneMonitor(int $ine_monitor): self
    {
        $this->ine_monitor = $ine_monitor;

        return $this;
    }

    public function getIneOperator(): ?int
    {
        return $this->ine_operator;
    }

    public function setIneOperator(int $ine_operator): self
    {
        $this->ine_operator = $ine_operator;

        return $this;
    }

    public function getSkolenieMonitor(): ?int
    {
        return $this->skolenie_monitor;
    }

    public function setSkolenieMonitor(int $skolenie_monitor): self
    {
        $this->skolenie_monitor = $skolenie_monitor;

        return $this;
    }

    public function getSkolenieOperator(): ?int
    {
        return $this->skolenie_operator;
    }

    public function setSkolenieOperator(int $skolenie_operator): self
    {
        $this->skolenie_operator = $skolenie_operator;

        return $this;
    }

    public function getPozicanyMonitor(): ?int
    {
        return $this->pozicany_monitor;
    }

    public function setPozicanyMonitor(int $pozicany_monitor): self
    {
        $this->pozicany_monitor = $pozicany_monitor;

        return $this;
    }

    public function getPozicanyOperator(): ?int
    {
        return $this->pozicany_operator;
    }

    public function setPozicanyOperator(int $pozicany_operator): self
    {
        $this->pozicany_operator = $pozicany_operator;

        return $this;
    }

    public function getVypozicanyMonitor(): ?int
    {
        return $this->vypozicany_monitor;
    }

    public function setVypozicanyMonitor(int $vypozicany_monitor): self
    {
        $this->vypozicany_monitor = $vypozicany_monitor;

        return $this;
    }

    public function getVypozicanyOperator(): ?int
    {
        return $this->vypozicany_operator;
    }

    public function setVypozicanyOperator(int $vypozicany_operator): self
    {
        $this->vypozicany_operator = $vypozicany_operator;

        return $this;
    }

    public function getNadcas2ZmenyMonitor(): ?int
    {
        return $this->nadcas_2_zmeny_monitor;
    }

    public function setNadcas2ZmenyMonitor(int $nadcas_2_zmeny_monitor): self
    {
        $this->nadcas_2_zmeny_monitor = $nadcas_2_zmeny_monitor;

        return $this;
    }

    public function getNadcas2ZmenyOperator(): ?int
    {
        return $this->nadcas_2_zmeny_operator;
    }

    public function setNadcas2ZmenyOperator(int $nadcas_2_zmeny_operator): self
    {
        $this->nadcas_2_zmeny_operator = $nadcas_2_zmeny_operator;

        return $this;
    }



    public function getZastaveniaTextFab(): ?string
    {
        return $this->zastavenia_text_fab;
    }

    public function setZastaveniaTextFab(string $zastavenia_text_fab): self
    {
        $this->zastavenia_text_fab = $zastavenia_text_fab;

        return $this;
    }

    public function getZastaveniaIntFab(): ?int
    {
        return $this->zastavenia_int_fab;
    }

    public function setZastaveniaIntFab(int $zastavenia_int_fab): self
    {
        $this->zastavenia_int_fab = $zastavenia_int_fab;

        return $this;
    }

    public function getUdrzbaText(): ?string
    {
        return $this->udrzba_text;
    }

    public function setUdrzbaText(string $udrzba_text): self
    {
        $this->udrzba_text = $udrzba_text;

        return $this;
    }

    public function getUdrzbaInt(): ?int
    {
        return $this->udrzba_int;
    }

    public function setUdrzbaInt(int $udrzba_int): self
    {
        $this->udrzba_int = $udrzba_int;

        return $this;
    }

    public function getLogistikaText(): ?string
    {
        return $this->logistika_text;
    }

    public function setLogistikaText(string $logistika_text): self
    {
        $this->logistika_text = $logistika_text;

        return $this;
    }

    public function getLogistikaInt(): ?int
    {
        return $this->logistika_int;
    }

    public function setLogistikaInt(int $logistika_int): self
    {
        $this->logistika_int = $logistika_int;

        return $this;
    }

    public function getSaturaciaText(): ?string
    {
        return $this->saturacia_text;
    }

    public function setSaturaciaText(string $saturacia_text): self
    {
        $this->saturacia_text = $saturacia_text;

        return $this;
    }

    public function getSaturaciaInt(): ?int
    {
        return $this->saturacia_int;
    }

    public function setSaturaciaInt(int $saturacia_int): self
    {
        $this->saturacia_int = $saturacia_int;

        return $this;
    }

    public function getNedostatokText(): ?string
    {
        return $this->nedostatok_text;
    }

    public function setNedostatokText(string $nedostatok_text): self
    {
        $this->nedostatok_text = $nedostatok_text;

        return $this;
    }

    public function getNedostatokInt(): ?int
    {
        return $this->nedostatok_int;
    }

    public function setNedostatokInt(int $nedostatok_int): self
    {
        $this->nedostatok_int = $nedostatok_int;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'nadcas' => $this->nadcas,
        ];
    }

    //public function getTeoretickaVyroba(): ?float
   // {
    //    return $this->teoreticka_vyroba;
   // }

  //  public function setTeoretickaVyroba(float $teoreticka_vyroba): self
   // {
   //     $this->teoreticka_vyroba = $teoreticka_vyroba;

    //    return $this;
   // }

   // public function getPocetVyrobenych(): ?int
   // {
   //     return $this->pocet_vyrobenych;
   // }

//   public function setPocetVyrobenych(int $pocet_vyrobenych): self
//   {
//        $this->pocet_vyrobenych = $pocet_vyrobenych;
//    return $this;
//  }



}