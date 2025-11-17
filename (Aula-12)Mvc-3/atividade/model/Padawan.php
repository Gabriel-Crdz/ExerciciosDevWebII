<?php
include_once(__DIR__ . "/Mestre.php");
include_once(__DIR__ . "/Planeta.php");

class Padawan{
    /* Atributos */
    private ?int $id;
    private ?string $nome;
    private ?string $especie;
    private ?string $status;
    private ?int $idade;
    private ?Mestre $mestre;
    private ?Planeta $planeta;

    /* Metodos */
    
    public function getStatusDesc(){
        if($this->status == "T") return "Em treinamento";
        elseif($this->status == "A") return "Aprovado";
        elseif($this->status == "M") return "Morto";
        elseif($this->status == "E") return "Exilado";
        return "";
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

     /*Getter, Setter Especie */
    public function getEspecie(): ?string{
        return $this->especie;
    }
    public function setEspecie(?string $especie): self{
        $this->especie = $especie;
        return $this;
    }

    /* Getter, Setter Status */
    public function getStatus(): ?string{
        return $this->status;
    }
    public function setStatus(?string $status): self{
        $this->status = $status;
        return $this;
    }

    /*Getter, Setter Idade */
    public function getIdade(): ?int{
        return $this->idade;
    }
    public function setIdade(?int $idade): self{
        $this->idade = $idade;
        return $this;
    }

    /* Getter, Setter Mestre */
    public function getMestre(): ?Mestre{
        return $this->mestre;
    }
    public function setMestre(?Mestre $mestre): self{
        $this->mestre = $mestre;
        return $this;
    }

    /* Getter, Setter Planeta */
      public function getPlaneta(): ?Planeta{
        return $this->planeta;
    }
    public function setPlaneta(?Planeta $planeta): self{
        $this->planeta = $planeta;
        return $this;
    }
}


?>