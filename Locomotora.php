<?php
class Locomotora{
    private float $peso;
    private float $velocidadMax;

    public function __construct($peso, $velocidadMax) {
        $this->peso = $peso;
        $this->velocidadMax = $velocidadMax;
    }

    public function getVelocidadMax(){
        return $this->velocidadMax;
    }
    public function getPeso(){
        return $this->peso;
    }

    public function setVelocidadMax($velocidadMax){
        $this->velocidadMax = $velocidadMax;
    }
    public function setPeso($peso){
        $this->peso = $peso;
    }
    public function __toString()
    {
        return "Velocidad Maxima:".$this->getVelocidadMax(). "Peso de locomotora:".$this->getPeso();

    }
    }
?>