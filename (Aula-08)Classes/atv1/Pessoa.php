<?php
class Pessoa{
    private string $nome;
    private string $sobrenome;

    public function __construct($nome="", $sobrenome=""){ // Metodo Construtor
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
    }

    /* Getter, Setter Nome */
    public function getNome(): string{
        return $this->nome;
    }
    public function setNome(string $nome): self{
        $this->nome = $nome;
        return $this;
    }

    /* Getter, Setter Nome */
    public function getSobrenome(): string{
        return $this->sobrenome;
    }
    public function setSobrenome(string $sobrenome): self{
        $this->sobrenome = $sobrenome;
        return $this;
    }
}


?>