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
     * @var \DateTime
     *
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
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $nadcas =0;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uep;


    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $suma_pracovnikov_monitor = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $suma_pracovnikov_operator =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $pn_lekar_monitor =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $pn_lekar_operator =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $dovolenka_nv_monitor =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $dovolenka_nv_operator =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $ine_monitor =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $ine_operator =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $skolenie_monitor =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $skolenie_operator =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $pozicany_monitor =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer",options={"unsigned":true, "default":0})
     */
    private $pozicany_operator =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $vypozicany_monitor =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $vypozicany_operator =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $nadcas_2_zmeny_monitor =0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $nadcas_2_zmeny_operator =0;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, options={"default":""})
     */
    private $zastavenia_text_fab = "";

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $zastavenia_int_fab=0;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, options={"default":""})
     */
    private $udrzba_text = "";

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $udrzba_int =0;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, options={"default":""})
     */
    private $logistika_text ="";

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $logistika_int =0;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, options={"default":""})
     */
    private $saturacia_text ="";

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $saturacia_int =0;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, options={"default":""})
     */
    private $nedostatok_text ="";

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $nedostatok_int =0;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getDen(): ?\DateTime
    {
        return $this->den;
    }

    /**
     * @param \DateTime $den
     */
    public function setDen(\DateTime $den): void
    {
        $this->den = new \DateTime($den->format('Y-m-d'));
    }

    /**
     * @return mixed
     */
    public function getLinka()
    {
        return $this->linka;
    }

    /**
     * @param mixed $linka
     */
    public function setLinka($linka): void
    {
        $this->linka = $linka;
    }

    /**
     * @return mixed
     */
    public function getZmena()
    {
        return $this->zmena;
    }

    /**
     * @param mixed $zmena
     */
    public function setZmena($zmena): void
    {
        $this->zmena = $zmena;
    }

    /**
     * @return int
     */
    public function getNadcas(): int
    {
        return $this->nadcas;
    }

    /**
     * @param int $nadcas
     */
    public function setNadcas(int $nadcas): void
    {
        $this->nadcas = $nadcas;
    }

    /**
     * @return mixed
     */
    public function getUep()
    {
        return $this->uep;
    }

    /**
     * @param mixed $uep
     */
    public function setUep($uep): void
    {
        $this->uep = $uep;
    }

    /**
     * @return int
     */
    public function getSumaPracovnikovMonitor(): int
    {
        return $this->suma_pracovnikov_monitor;
    }

    /**
     * @param int $suma_pracovnikov_monitor
     */
    public function setSumaPracovnikovMonitor(int $suma_pracovnikov_monitor): void
    {
        $this->suma_pracovnikov_monitor = $suma_pracovnikov_monitor;
    }

    /**
     * @return int
     */
    public function getSumaPracovnikovOperator(): int
    {
        return $this->suma_pracovnikov_operator;
    }

    /**
     * @param int $suma_pracovnikov_operator
     */
    public function setSumaPracovnikovOperator(int $suma_pracovnikov_operator): void
    {
        $this->suma_pracovnikov_operator = $suma_pracovnikov_operator;
    }

    /**
     * @return int
     */
    public function getPnLekarMonitor(): int
    {
        return $this->pn_lekar_monitor;
    }

    /**
     * @param int $pn_lekar_monitor
     */
    public function setPnLekarMonitor(int $pn_lekar_monitor): void
    {
        $this->pn_lekar_monitor = $pn_lekar_monitor;
    }

    /**
     * @return int
     */
    public function getPnLekarOperator(): int
    {
        return $this->pn_lekar_operator;
    }

    /**
     * @param int $pn_lekar_operator
     */
    public function setPnLekarOperator(int $pn_lekar_operator): void
    {
        $this->pn_lekar_operator = $pn_lekar_operator;
    }

    /**
     * @return int
     */
    public function getDovolenkaNvMonitor(): int
    {
        return $this->dovolenka_nv_monitor;
    }

    /**
     * @param int $dovolenka_nv_monitor
     */
    public function setDovolenkaNvMonitor(int $dovolenka_nv_monitor): void
    {
        $this->dovolenka_nv_monitor = $dovolenka_nv_monitor;
    }

    /**
     * @return int
     */
    public function getDovolenkaNvOperator(): int
    {
        return $this->dovolenka_nv_operator;
    }

    /**
     * @param int $dovolenka_nv_operator
     */
    public function setDovolenkaNvOperator(int $dovolenka_nv_operator): void
    {
        $this->dovolenka_nv_operator = $dovolenka_nv_operator;
    }

    /**
     * @return int
     */
    public function getIneMonitor(): int
    {
        return $this->ine_monitor;
    }

    /**
     * @param int $ine_monitor
     */
    public function setIneMonitor(int $ine_monitor): void
    {
        $this->ine_monitor = $ine_monitor;
    }

    /**
     * @return int
     */
    public function getIneOperator(): int
    {
        return $this->ine_operator;
    }

    /**
     * @param int $ine_operator
     */
    public function setIneOperator(int $ine_operator): void
    {
        $this->ine_operator = $ine_operator;
    }

    /**
     * @return int
     */
    public function getSkolenieMonitor(): int
    {
        return $this->skolenie_monitor;
    }

    /**
     * @param int $skolenie_monitor
     */
    public function setSkolenieMonitor(int $skolenie_monitor): void
    {
        $this->skolenie_monitor = $skolenie_monitor;
    }

    /**
     * @return int
     */
    public function getSkolenieOperator(): int
    {
        return $this->skolenie_operator;
    }

    /**
     * @param int $skolenie_operator
     */
    public function setSkolenieOperator(int $skolenie_operator): void
    {
        $this->skolenie_operator = $skolenie_operator;
    }

    /**
     * @return int
     */
    public function getPozicanyMonitor(): int
    {
        return $this->pozicany_monitor;
    }

    /**
     * @param int $pozicany_monitor
     */
    public function setPozicanyMonitor(int $pozicany_monitor): void
    {
        $this->pozicany_monitor = $pozicany_monitor;
    }

    /**
     * @return int
     */
    public function getPozicanyOperator(): int
    {
        return $this->pozicany_operator;
    }

    /**
     * @param int $pozicany_operator
     */
    public function setPozicanyOperator(int $pozicany_operator): void
    {
        $this->pozicany_operator = $pozicany_operator;
    }

    /**
     * @return int
     */
    public function getVypozicanyMonitor(): int
    {
        return $this->vypozicany_monitor;
    }

    /**
     * @param int $vypozicany_monitor
     */
    public function setVypozicanyMonitor(int $vypozicany_monitor): void
    {
        $this->vypozicany_monitor = $vypozicany_monitor;
    }

    /**
     * @return int
     */
    public function getVypozicanyOperator(): int
    {
        return $this->vypozicany_operator;
    }

    /**
     * @param int $vypozicany_operator
     */
    public function setVypozicanyOperator(int $vypozicany_operator): void
    {
        $this->vypozicany_operator = $vypozicany_operator;
    }

    /**
     * @return int
     */
    public function getNadcas2ZmenyMonitor(): int
    {
        return $this->nadcas_2_zmeny_monitor;
    }

    /**
     * @param int $nadcas_2_zmeny_monitor
     */
    public function setNadcas2ZmenyMonitor(int $nadcas_2_zmeny_monitor): void
    {
        $this->nadcas_2_zmeny_monitor = $nadcas_2_zmeny_monitor;
    }

    /**
     * @return int
     */
    public function getNadcas2ZmenyOperator(): int
    {
        return $this->nadcas_2_zmeny_operator;
    }

    /**
     * @param int $nadcas_2_zmeny_operator
     */
    public function setNadcas2ZmenyOperator(int $nadcas_2_zmeny_operator): void
    {
        $this->nadcas_2_zmeny_operator = $nadcas_2_zmeny_operator;
    }

    /**
     * @return string
     */
    public function getZastaveniaTextFab(): string
    {
        return $this->zastavenia_text_fab;
    }

    /**
     * @param string $zastavenia_text_fab
     */
    public function setZastaveniaTextFab(string $zastavenia_text_fab): void
    {
        $this->zastavenia_text_fab = $zastavenia_text_fab;
    }

    /**
     * @return int
     */
    public function getZastaveniaIntFab(): int
    {
        return $this->zastavenia_int_fab;
    }

    /**
     * @param int $zastavenia_int_fab
     */
    public function setZastaveniaIntFab(int $zastavenia_int_fab): void
    {
        $this->zastavenia_int_fab = $zastavenia_int_fab;
    }

    /**
     * @return string
     */
    public function getUdrzbaText(): string
    {
        return $this->udrzba_text;
    }

    /**
     * @param string $udrzba_text
     */
    public function setUdrzbaText(string $udrzba_text): void
    {
        $this->udrzba_text = $udrzba_text;
    }

    /**
     * @return int
     */
    public function getUdrzbaInt(): int
    {
        return $this->udrzba_int;
    }

    /**
     * @param int $udrzba_int
     */
    public function setUdrzbaInt(int $udrzba_int): void
    {
        $this->udrzba_int = $udrzba_int;
    }

    /**
     * @return string
     */
    public function getLogistikaText(): string
    {
        return $this->logistika_text;
    }

    /**
     * @param string $logistika_text
     */
    public function setLogistikaText(string $logistika_text): void
    {
        $this->logistika_text = $logistika_text;
    }

    /**
     * @return int
     */
    public function getLogistikaInt(): int
    {
        return $this->logistika_int;
    }

    /**
     * @param int $logistika_int
     */
    public function setLogistikaInt(int $logistika_int): void
    {
        $this->logistika_int = $logistika_int;
    }

    /**
     * @return string
     */
    public function getSaturaciaText(): string
    {
        return $this->saturacia_text;
    }

    /**
     * @param string $saturacia_text
     */
    public function setSaturaciaText(string $saturacia_text): void
    {
        $this->saturacia_text = $saturacia_text;
    }

    /**
     * @return int
     */
    public function getSaturaciaInt(): int
    {
        return $this->saturacia_int;
    }

    /**
     * @param int $saturacia_int
     */
    public function setSaturaciaInt(int $saturacia_int): void
    {
        $this->saturacia_int = $saturacia_int;
    }

    /**
     * @return string
     */
    public function getNedostatokText(): string
    {
        return $this->nedostatok_text;
    }

    /**
     * @param string $nedostatok_text
     */
    public function setNedostatokText(string $nedostatok_text): void
    {
        $this->nedostatok_text = $nedostatok_text;
    }

    /**
     * @return int
     */
    public function getNedostatokInt(): int
    {
        return $this->nedostatok_int;
    }

    /**
     * @param int $nedostatok_int
     */
    public function setNedostatokInt(int $nedostatok_int): void
    {
        $this->nedostatok_int = $nedostatok_int;
    }



//    /**
//     * @ORM\Column(type="float")
//     */
//    private $teoreticka_vyroba;
//
//    /**
//     * @ORM\Column(type="integer")
//     */
//    private $pocet_vyrobenych;



    public function toArray(): array
    {
        return [
            'nadcas' => $this->nadcas,
            'suma_pracovnikov_m' => $this->suma_pracovnikov_monitor,
            'suma_pracovnikov_o' => $this->suma_pracovnikov_operator,
            'pn_lekar_m' => $this->pn_lekar_monitor,
            'pn_lekar_o' => $this->pn_lekar_operator,
            'dovolenka_nv_m' => $this->dovolenka_nv_monitor,
            'dovolenka_nv_o' => $this->dovolenka_nv_operator,
            'ine_m' => $this->ine_monitor,
            'ine_o' => $this->ine_operator,
            'skolenie_m' => $this->skolenie_monitor,
            'skolenie_o' => $this->skolenie_operator,
            'pozicany_m' => $this->pozicany_monitor,
            'pozicany_o' => $this->pozicany_operator,
            'vypozicany_m' => $this->vypozicany_monitor,
            'vypozicany_o' => $this->vypozicany_operator,
            'nadcas_2_zmeny_m' => $this->nadcas_2_zmeny_monitor,
            'nadcas_2_zmeny_o' => $this->nadcas_2_zmeny_operator,
            'zastavenia_text_f' => $this->zastavenia_text_fab,
            'zastavenia_int_f' => $this->zastavenia_int_fab,
            'udrzba_t' => $this->udrzba_text,
            'udrzba_i' => $this->udrzba_int,
            'logistika_t' => $this->logistika_text,
            'logistika_i' => $this->logistika_int,
            'saturacia_t' => $this->saturacia_text,
            'saturacia_i' => $this->saturacia_int,
            'nedostatok_t' => $this->nedostatok_text,
            'nedostatok_i' => $this->nedostatok_int,
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