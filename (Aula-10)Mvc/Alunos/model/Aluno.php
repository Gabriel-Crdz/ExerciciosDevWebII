<?php
include_once(__DIR__ . "/Curso.php");

class Aluno{
    /* Atributos */
    private ?int $id;
    private ?string $nome;
    private ?int $idade;
    private ?string $estrangeiro;
    private ?Curso $curso;

    /* Metodos */

    public function isEstrangeiro(){
        if($this->estrangeiro == "S") return "Sim";
        elseif($this->estrangeiro == "N") return "Não";
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

    /*Getter, Setter Idade */
    public function getIdade(): ?int{
        return $this->idade;
    }

    public function setIdade(?int $idade): self{
        $this->idade = $idade;
        return $this;
    }

    /*Getter, Setter Estrangeiro */
    public function getEstrangeiro(): ?string{
        return $this->estrangeiro;
    }
    public function setEstrangeiro(?string $estrangeiro): self
    {
        $this->estrangeiro = $estrangeiro;

        return $this;
    }

    /*Getter, Setter Curso */
    public function getCurso(): ?Curso{
        return $this->curso;
    }
    public function setCurso(?Curso $curso): self{
        $this->curso = $curso;
        return $this;
    }
}


?>