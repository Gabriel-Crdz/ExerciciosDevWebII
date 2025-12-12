<?php

namespace App\Model;
use \JsonSerializable;
use App\Model\Mestre;
use App\Model\Planeta;

class Padawan  implements JsonSerializable{
    /* Atributos */
    private ?int $id;
    private ?string $nome;
    private ?string $especie;
    private ?string $estado;
    private ?int $idade;
    private ?string $sabre;
    private ?Mestre $mestre;
    private ?Planeta $planeta;

    /* Metodos */
    public function __construct(){
        $this->id = 0;
        $this->nome = null;
        $this->especie = null;
        $this->estado = null;
        $this->idade = 0;
        $this->sabre = null;
        $this->mestre = null;
        $this->planeta = null;
    }
    
    public function JsonSerialize(): array{
        return array(
            "id" => $this->id, 
            "nome" => $this->nome,
            "especie" => $this->especie,
            "estado" => $this->estado,
            "idade" => $this->idade,
            "cor_sabre" => $this->sabre,
            "id_mestre" => $this->mestre->getId(),
            "id_planeta" => $this->planeta->getId()
        );
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

    /* Getter, Setter estado */
    public function getEstado(): ?string{
        return $this->estado;
    }
    public function setEstado(?string $estado): self{
        $this->estado = $estado;
        return $this;
    }
    
    /* Getter, Setter estado */
    public function getSabre(): ?string{
        return $this->sabre;
    }
    public function setSabre(?string $sabre): self{
        $this->sabre = $sabre;
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