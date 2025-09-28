<?php
include_once("Estado.php");
class Cidade extends Estado{
    private string $nome;
    private int $qtdHab;
    private int $altitude;

    public function __construct(string $n, int $hab, int $alt, string $ne, string $s){
        $this->nome = $n;
        $this->qtdHab = $hab;
        $this->altitude = $alt;
    }

    /* Getter, Setter Nome */
    public function getNome(){
        return $this->nome;
    }
    public function setNome(string $n): self{
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