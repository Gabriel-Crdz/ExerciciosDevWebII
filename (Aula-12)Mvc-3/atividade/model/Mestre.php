<?php
class Mestre{
    /* Atributos */
    private ?int $id; // "?" Indica que o id pode ser inteiro ou NULL
    private string $nome;
    private string $titulo;

    /* Metodos */
    public function getTituloDesc(){
        if($this->titulo == "C") return "Cavaleiro";
        elseif($this->titulo == "M") return "Mestre";
        elseif($this->titulo == "G") return "Grande-Mestre";
        return "";
    }

    public function getNomeTitulo(){
        return $this->nome . " - " . $this->getTituloDesc();
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