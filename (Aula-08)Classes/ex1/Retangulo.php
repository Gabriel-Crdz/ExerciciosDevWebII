<?php

class Retangulo{
    private int $base;
    private int $altura;

    public function __construct(int $b=0, int $h=0){
        $this->base = $b;
        $this->altura = $h;
    }

    /* Getter, Setter Base */
    public function getBase(): int{
        return $this->base;
    }
    public function setBase(int $b): self{
        $this->base = $b;
        return $this;
    }

    /* Getter, Setter Altura */
    public function getAltura(): int{
        return $this->altura;
    }
    public function setAltura(int $h): self{
        $this->altura = $h;
        return $this;
    }

    /* Getter Area */
    public function getArea(){
        $area = $this->base * $this->altura;
        return $area;
    }

    /* Getter Perimetro */
    public function getPerimetro(){
        $p = ($this->base * 2) + ($this->altura * 2);
        return $p;
    }
    
}

?>