<?php

class Calculadora{

    /* Atributos */
    private int $num1;
    private int $num2;

    public function __construct($num1 = 0, $num2 = 0){ // Metodo Construtor do php
        $this->num1 = $num1;
        $this->num2 = $num2;

    }

    /* Metodos */
    public function somar(){
        $soma = $this->num1 + $this->num2; // (this) objeto da classe, obrigatorio no php
        return $soma;
    }

    /**
     * Getter's , Setter's 
     */
    /* Getter, Setter Num1 */
    public function getNum1(): int{
        return $this->num1;
    }
    public function setNum1(int $num1): self{
        $this->num1 = $num1;
        return $this;
    }

    /* Getter, Setter Num2 */
    public function getNum2(): int
    {
        return $this->num2;
    }
    public function setNum2(int $num2): self
    {
        $this->num2 = $num2;

        return $this;
    }
}

?>