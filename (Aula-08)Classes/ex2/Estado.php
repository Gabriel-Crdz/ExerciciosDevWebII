<?php

class Estado{
    private string $nome;
    private string $sigla;

    public function __construct(string $n, string $s){
        $this->nome = $n;
        $this->sigla = $s;
    }

    public function getNome(): string{
        return $this->nome;
    }
    public function setNome(string $n): self{
        $this->nome = $n;
        return $this;
    }

    public function getSigla(): string{
        return $this->sigla;
    }
    public function setSigla(string $s): self{
        $this->sigla = $s;
        return $this;
    }

}

?>