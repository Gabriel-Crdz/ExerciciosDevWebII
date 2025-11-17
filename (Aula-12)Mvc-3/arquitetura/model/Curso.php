<?php
class Curso{
    /* Atributos */
    private ?int $id; // "?" Indica que o id pode ser inteiro ou NULL
    private string $nome;
    private string $turno;
    /* Metodos */
    
    public function getTurnoDesc(){
        if($this->turno == "N") return "Noturno";
        elseif($this->turno == "V") return "Vespertino";
        elseif($this->turno == "M") return "Matutino";
        return "";
    }

    public function getCursoTurno(){
        return $this->nome . " - " . $this->getTurnoDesc();
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

    /*Getter, Setter Turno */
    public function getTurno(): string{
        return $this->turno;
    }
    public function setTurno(string $turno): self{
        $this->turno = $turno;
        return $this;
    }
}

?>