<?php
class Planeta{
    /* Atributos */
    private ?int $id;
    private string $nome;
    private string $regiao;
    private string $quad;

    /* Metodos */

    public function getRegiaoDesc(){
        if($this->regiao == 'NP') return "Nucleo Profundo";
        elseif($this->regiao == 'N') return "Nucleo";
        elseif($this->regiao == 'C') return "Colonias";
        elseif($this->regiao == 'OI') return "Orla Interna";
        elseif($this->regiao == 'RE') return "Região de Expansão";
        elseif($this->regiao == 'OM') return "Orla Media";
        elseif($this->regiao == 'OE') return "Orla Exterior";
        return "";
    }

    public function getPlanetaDesc(){
        return $this->nome . " - " .$this->getRegiaoDesc() . " - " . $this->quad;
    }
    /*Getter, Setter Id */
    public function getId(): ?int{
        return $this->id;
    }
    public function setId(?int $id): self{
        $this->id = $id;
        return $this;
    }

    /*Getter, Setter Nome */
    public function getNome(): ?string{
        return $this->nome;
    }
    public function setNome(?string $nome): self{
        $this->nome = $nome;
        return $this;
    }

     /*Getter, Setter Regiao */
    public function getRegiao(): ?string{
        return $this->regiao;
    }
    public function setRegiao(?string $regiao): self{
        $this->regiao = $regiao;
        return $this;
    }
     /*Getter, Setter Quadrante */
    public function getQuad(): ?string{
        return $this->quad;
    }
    public function setQuad(?string $quad): self{
        $this->quad = $quad;
        return $this;
    }

}

?>