<?php
class Planeta{
    /* Atributos */
    private ?int $id;
    private string $nome;
    private string $regiao;
    private string $quad;

    /* Metodos */
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