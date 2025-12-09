<?php
class Mestre{
    /* Atributos */
    private ?int $id; // "?" Indica que o id pode ser inteiro ou NULL
    private string $nome;
    private string $titulo;

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
    public function getNome(): string{
        return $this->nome;
    }
    public function setNome(string $nome): self{
        $this->nome = $nome;
        return $this;
    }

    /*Getter, Setter Titulo */
    public function getTitulo(): string{
        return $this->titulo;
    }
    public function setTitulo(string $titulo): self{
        $this->titulo = $titulo;
        return $this;
    }
}



?>