<?php
include_once("Estado.php");
class Cidade extends Estado{
    private string $nome;
    private int $qtdHab;
    private int $area;
    private int $altitude;

    public function __construct(string $n, int $hab, int $a, int $alt, string $ne, string $s){
        $this->nome = $n;
        $this->qtdHab = $hab;
        $this->altitude = $alt;
        $this->area = $a;
        $this->setNomeEstado($ne);
        $this->setSigla($s);
    }

    /* Getter, Setter Nome */
    public function getNomeCidade(): string{
        return $this->nome;
    }
    public function setNomeCidade(string $n): self{
        $this->nome = $n;
        return $this;
    }

    /* Getter, Setter qtdHab */
    public function getQtdHab(): int{
        return $this->qtdHab;
    }
    public function setQtdHab(int $h): self{
        $this->qtdHab = $h;
        return $this;
    }

    /* Getter, Setter qtdHab */
    public function getArea(): int{
        return $this->area;
    }
    public function setArea(int $a): self{
        $this->area = $a;
        return $this;
    }

    /* Getter, Setter Altitude */
    public function getAltitude(): int{
        return $this->altitude;
    }
    public function setAltitude(int $alt): self{
        $this->altitude = $alt;
        return $this;
    }
}

?>