<?php

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
    private $nadcas = 0;

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
    private $suma_pracovnikov_operator = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $pn_lekar_monitor = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $pn_lekar_operator = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $dovolenka_nv_monitor = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $dovolenka_nv_operator = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $ine_monitor = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $ine_operator = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $skolenie_monitor = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $skolenie_operator = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $pozicany_monitor = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer",options={"unsigned":true, "default":0})
     */
    private $pozicany_operator = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $vypozicany_monitor = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $vypozicany_operator = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $nadcas_2_zmeny_monitor = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $nadcas_2_zmeny_operator = 0;

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
    private $zastavenia_int_fab = 0;

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
    private $udrzba_int = 0;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, options={"default":""})
     */
    private $logistika_text = "";

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $logistika_int = 0;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, options={"default":""})
     */
    private $saturacia_text = "";

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $saturacia_int = 0;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, options={"default":""})
     */
    private $nedostatok_text = "";

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true, "default":0})
     */
    private $nedostatok_int = 0;

    /**
     * Get id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param mixed $id
     *
     * @return Zaznam
     */
    public function setId($id): self
    {
        $this->id = $id;

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
        $this->den = $den;

        return $this;
    }

    /**
     * Get linka
     *
     * @return mixed
     */
    public function getLinka()
    {
        return $this->linka;
    }

    /**
     * Set linka
     *
     * @param mixed $linka
     *
     * @return Zaznam
     */
    public function setLinka($linka): self
    {
        $this->linka = $linka;

        return $this;
    }

    /**
     * Get zmena
     *
     * @return mixed
     */
    public function getZmena()
    {
        return $this->zmena;
    }

    /**
     * Set zmena
     *
     * @param mixed $zmena
     *
     * @return Zaznam
     */
    public function setZmena($zmena): self
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
     * @return mixed
     */
    public function getUep()
    {
        return $this->uep;
    }

    /**
     * Set uep
     *
     * @param mixed $uep
     *
     * @return Zaznam
     */
    public function setUep($uep): self
    {
        $this->uep = $uep;

        return $this;
    }

    /**
     * Get suma_pracovnikov_monitor
     *
     * @return int
     */
    public function getSumaPracovnikovMonitor(): int
    {
        return $this->suma_pracovnikov_monitor;
    }

    /**
     * Set suma_pracovnikov_monitor
     *
     * @param int $suma_pracovnikov_monitor
     *
     * @return Zaznam
     */
    public function setSumaPracovnikovMonitor(int $suma_pracovnikov_monitor): self
    {
        $this->suma_pracovnikov_monitor = $suma_pracovnikov_monitor;

        return $this;
    }

    /**
     * Get suma_pracovnikov_operator
     *
     * @return int
     */
    public function getSumaPracovnikovOperator(): int
    {
        return $this->suma_pracovnikov_operator;
    }

    /**
     * Set suma_pracovnikov_operator
     *
     * @param int $suma_pracovnikov_operator
     *
     * @return Zaznam
     */
    public function setSumaPracovnikovOperator(int $suma_pracovnikov_operator): self
    {
        $this->suma_pracovnikov_operator = $suma_pracovnikov_operator;

        return $this;
    }

    /**
     * Get pn_lekar_monitor
     *
     * @return int
     */
    public function getPnLekarMonitor(): int
    {
        return $this->pn_lekar_monitor;
    }

    /**
     * Set pn_lekar_monitor
     *
     * @param int $pn_lekar_monitor
     *
     * @return Zaznam
     */
    public function setPnLekarMonitor(int $pn_lekar_monitor): self
    {
        $this->pn_lekar_monitor = $pn_lekar_monitor;

        return $this;
    }

    /**
     * Get pn_lekar_operator
     *
     * @return int
     */
    public function getPnLekarOperator(): int
    {
        return $this->pn_lekar_operator;
    }

    /**
     * Set pn_lekar_operator
     *
     * @param int $pn_lekar_operator
     *
     * @return Zaznam
     */
    public function setPnLekarOperator(int $pn_lekar_operator): self
    {
        $this->pn_lekar_operator = $pn_lekar_operator;

        return $this;
    }

    /**
     * Get dovolenka_nv_monitor
     *
     * @return int
     */
    public function getDovolenkaNvMonitor(): int
    {
        return $this->dovolenka_nv_monitor;
    }

    /**
     * Set dovolenka_nv_monitor
     *
     * @param int $dovolenka_nv_monitor
     *
     * @return Zaznam
     */
    public function setDovolenkaNvMonitor(int $dovolenka_nv_monitor): self
    {
        $this->dovolenka_nv_monitor = $dovolenka_nv_monitor;

        return $this;
    }

    /**
     * Get dovolenka_nv_operator
     *
     * @return int
     */
    public function getDovolenkaNvOperator(): int
    {
        return $this->dovolenka_nv_operator;
    }

    /**
     * Set dovolenka_nv_operator
     *
     * @param int $dovolenka_nv_operator
     *
     * @return Zaznam
     */
    public function setDovolenkaNvOperator(int $dovolenka_nv_operator): self
    {
        $this->dovolenka_nv_operator = $dovolenka_nv_operator;

        return $this;
    }

    /**
     * Get ine_monitor
     *
     * @return int
     */
    public function getIneMonitor(): int
    {
        return $this->ine_monitor;
    }

    /**
     * Set ine_monitor
     *
     * @param int $ine_monitor
     *
     * @return Zaznam
     */
    public function setIneMonitor(int $ine_monitor): self
    {
        $this->ine_monitor = $ine_monitor;

        return $this;
    }

    /**
     * Get ine_operator
     *
     * @return int
     */
    public function getIneOperator(): int
    {
        return $this->ine_operator;
    }

    /**
     * Set ine_operator
     *
     * @param int $ine_operator
     *
     * @return Zaznam
     */
    public function setIneOperator(int $ine_operator): self
    {
        $this->ine_operator = $ine_operator;

        return $this;
    }

    /**
     * Get skolenie_monitor
     *
     * @return int
     */
    public function getSkolenieMonitor(): int
    {
        return $this->skolenie_monitor;
    }

    /**
     * Set skolenie_monitor
     *
     * @param int $skolenie_monitor
     *
     * @return Zaznam
     */
    public function setSkolenieMonitor(int $skolenie_monitor): self
    {
        $this->skolenie_monitor = $skolenie_monitor;

        return $this;
    }

    /**
     * Get skolenie_operator
     *
     * @return int
     */
    public function getSkolenieOperator(): int
    {
        return $this->skolenie_operator;
    }

    /**
     * Set skolenie_operator
     *
     * @param int $skolenie_operator
     *
     * @return Zaznam
     */
    public function setSkolenieOperator(int $skolenie_operator): self
    {
        $this->skolenie_operator = $skolenie_operator;

        return $this;
    }

    /**
     * Get pozicany_monitor
     *
     * @return int
     */
    public function getPozicanyMonitor(): int
    {
        return $this->pozicany_monitor;
    }

    /**
     * Set pozicany_monitor
     *
     * @param int $pozicany_monitor
     *
     * @return Zaznam
     */
    public function setPozicanyMonitor(int $pozicany_monitor): self
    {
        $this->pozicany_monitor = $pozicany_monitor;

        return $this;
    }

    /**
     * Get pozicany_operator
     *
     * @return int
     */
    public function getPozicanyOperator(): int
    {
        return $this->pozicany_operator;
    }

    /**
     * Set pozicany_operator
     *
     * @param int $pozicany_operator
     *
     * @return Zaznam
     */
    public function setPozicanyOperator(int $pozicany_operator): self
    {
        $this->pozicany_operator = $pozicany_operator;

        return $this;
    }

    /**
     * Get vypozicany_monitor
     *
     * @return int
     */
    public function getVypozicanyMonitor(): int
    {
        return $this->vypozicany_monitor;
    }

    /**
     * Set vypozicany_monitor
     *
     * @param int $vypozicany_monitor
     *
     * @return Zaznam
     */
    public function setVypozicanyMonitor(int $vypozicany_monitor): self
    {
        $this->vypozicany_monitor = $vypozicany_monitor;

        return $this;
    }

    /**
     * Get vypozicany_operator
     *
     * @return int
     */
    public function getVypozicanyOperator(): int
    {
        return $this->vypozicany_operator;
    }

    /**
     * Set vypozicany_operator
     *
     * @param int $vypozicany_operator
     *
     * @return Zaznam
     */
    public function setVypozicanyOperator(int $vypozicany_operator): self
    {
        $this->vypozicany_operator = $vypozicany_operator;

        return $this;
    }

    /**
     * Get nadcas_2_zmeny_monitor
     *
     * @return int
     */
    public function getNadcas2ZmenyMonitor(): int
    {
        return $this->nadcas_2_zmeny_monitor;
    }

    /**
     * Set nadcas_2_zmeny_monitor
     *
     * @param int $nadcas_2_zmeny_monitor
     *
     * @return Zaznam
     */
    public function setNadcas2ZmenyMonitor(int $nadcas_2_zmeny_monitor): self
    {
        $this->nadcas_2_zmeny_monitor = $nadcas_2_zmeny_monitor;

        return $this;
    }

    /**
     * Get nadcas_2_zmeny_operator
     *
     * @return int
     */
    public function getNadcas2ZmenyOperator(): int
    {
        return $this->nadcas_2_zmeny_operator;
    }

    /**
     * Set nadcas_2_zmeny_operator
     *
     * @param int $nadcas_2_zmeny_operator
     *
     * @return Zaznam
     */
    public function setNadcas2ZmenyOperator(int $nadcas_2_zmeny_operator): self
    {
        $this->nadcas_2_zmeny_operator = $nadcas_2_zmeny_operator;

        return $this;
    }

    /**
     * Get zastavenia_text_fab
     *
     * @return string
     */
    public function getZastaveniaTextFab(): string
    {
        return $this->zastavenia_text_fab;
    }

    /**
     * Set zastavenia_text_fab
     *
     * @param string $zastavenia_text_fab
     *
     * @return Zaznam
     */
    public function setZastaveniaTextFab(string $zastavenia_text_fab): self
    {
        $this->zastavenia_text_fab = $zastavenia_text_fab;

        return $this;
    }

    /**
     * Get zastavenia_int_fab
     *
     * @return int
     */
    public function getZastaveniaIntFab(): int
    {
        return $this->zastavenia_int_fab;
    }

    /**
     * Set zastavenia_int_fab
     *
     * @param int $zastavenia_int_fab
     *
     * @return Zaznam
     */
    public function setZastaveniaIntFab(int $zastavenia_int_fab): self
    {
        $this->zastavenia_int_fab = $zastavenia_int_fab;

        return $this;
    }

    /**
     * Get udrzba_text
     *
     * @return string
     */
    public function getUdrzbaText(): string
    {
        return $this->udrzba_text;
    }

    /**
     * Set udrzba_text
     *
     * @param string $udrzba_text
     *
     * @return Zaznam
     */
    public function setUdrzbaText(string $udrzba_text): self
    {
        $this->udrzba_text = $udrzba_text;

        return $this;
    }

    /**
     * Get udrzba_int
     *
     * @return int
     */
    public function getUdrzbaInt(): int
    {
        return $this->udrzba_int;
    }

    /**
     * Set udrzba_int
     *
     * @param int $udrzba_int
     *
     * @return Zaznam
     */
    public function setUdrzbaInt(int $udrzba_int): self
    {
        $this->udrzba_int = $udrzba_int;

        return $this;
    }

    /**
     * Get logistika_text
     *
     * @return string
     */
    public function getLogistikaText(): string
    {
        return $this->logistika_text;
    }

    /**
     * Set logistika_text
     *
     * @param string $logistika_text
     *
     * @return Zaznam
     */
    public function setLogistikaText(string $logistika_text): self
    {
        $this->logistika_text = $logistika_text;

        return $this;
    }

    /**
     * Get logistika_int
     *
     * @return int
     */
    public function getLogistikaInt(): int
    {
        return $this->logistika_int;
    }

    /**
     * Set logistika_int
     *
     * @param int $logistika_int
     *
     * @return Zaznam
     */
    public function setLogistikaInt(int $logistika_int): self
    {
        $this->logistika_int = $logistika_int;

        return $this;
    }

    /**
     * Get saturacia_text
     *
     * @return string
     */
    public function getSaturaciaText(): string
    {
        return $this->saturacia_text;
    }

    /**
     * Set saturacia_text
     *
     * @param string $saturacia_text
     *
     * @return Zaznam
     */
    public function setSaturaciaText(string $saturacia_text): self
    {
        $this->saturacia_text = $saturacia_text;

        return $this;
    }

    /**
     * Get saturacia_int
     *
     * @return int
     */
    public function getSaturaciaInt(): int
    {
        return $this->saturacia_int;
    }

    /**
     * Set saturacia_int
     *
     * @param int $saturacia_int
     *
     * @return Zaznam
     */
    public function setSaturaciaInt(int $saturacia_int): self
    {
        $this->saturacia_int = $saturacia_int;

        return $this;
    }

    /**
     * Get nedostatok_text
     *
     * @return string
     */
    public function getNedostatokText(): string
    {
        return $this->nedostatok_text;
    }

    /**
     * Set nedostatok_text
     *
     * @param string $nedostatok_text
     *
     * @return Zaznam
     */
    public function setNedostatokText(string $nedostatok_text): self
    {
        $this->nedostatok_text = $nedostatok_text;

        return $this;
    }

    /**
     * Get nedostatok_int
     *
     * @return int
     */
    public function getNedostatokInt(): int
    {
        return $this->nedostatok_int;
    }

    /**
     * Set nedostatok_int
     *
     * @param int $nedostatok_int
     *
     * @return Zaznam
     */
    public function setNedostatokInt(int $nedostatok_int): self
    {
        $this->nedostatok_int = $nedostatok_int;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'nadcas'             => $this->nadcas,
            'suma_pracovnikov_m' => $this->suma_pracovnikov_monitor,
            'suma_pracovnikov_o' => $this->suma_pracovnikov_operator,
            'pn_lekar_m'         => $this->pn_lekar_monitor,
            'pn_lekar_o'         => $this->pn_lekar_operator,
            'dovolenka_nv_m'     => $this->dovolenka_nv_monitor,
            'dovolenka_nv_o'     => $this->dovolenka_nv_operator,
            'ine_m'              => $this->ine_monitor,
            'ine_o'              => $this->ine_operator,
            'skolenie_m'         => $this->skolenie_monitor,
            'skolenie_o'         => $this->skolenie_operator,
            'pozicany_m'         => $this->pozicany_monitor,
            'pozicany_o'         => $this->pozicany_operator,
            'vypozicany_m'       => $this->vypozicany_monitor,
            'vypozicany_o'       => $this->vypozicany_operator,
            'nadcas_2_zmeny_m'   => $this->nadcas_2_zmeny_monitor,
            'nadcas_2_zmeny_o'   => $this->nadcas_2_zmeny_operator,
            'zastavenia_text_f'  => $this->zastavenia_text_fab,
            'zastavenia_int_f'   => $this->zastavenia_int_fab,
            'udrzba_t'           => $this->udrzba_text,
            'udrzba_i'           => $this->udrzba_int,
            'logistika_t'        => $this->logistika_text,
            'logistika_i'        => $this->logistika_int,
            'saturacia_t'        => $this->saturacia_text,
            'saturacia_i'        => $this->saturacia_int,
            'nedostatok_t'       => $this->nedostatok_text,
            'nedostatok_i'       => $this->nedostatok_int,
        ];
    }
}
