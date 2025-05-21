<?php

class Locomotora extends Vagon {
    private float $pesoLocomotora;
    private float $velocidadMax;

    public function __construct(
        DateTime $anioInstalacion,
        float $largo,
        float $ancho,
        float $pesoVacio,
        int $tipo,                   // 1 o 2 (por herencia)
        int $pasajeroMax = 0,
        float $pesoMaxTrans = 0,
        float $pesoLocomotora = 0,
        float $velocidadMax = 0
    ) {
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVacio, $tipo, $pasajeroMax, $pesoMaxTrans);
        $this->pesoLocomotora = $pesoLocomotora;
        $this->velocidadMax = $velocidadMax;
    }

    // Getters
    public function getPesoLocomotora(): float {
        return $this->pesoLocomotora;
    }

    public function getVelocidadMax(): float {
        return $this->velocidadMax;
    }

    // Setters
    public function setPesoLocomotora(float $peso): void {
        $this->pesoLocomotora = $peso;
    }

    public function setVelocidadMax(float $velocidad): void {
        $this->velocidadMax = $velocidad;
    }

    // toString
    public function __toString(): string {
        return parent::__toString()
            . "🚂 LOCOMOTORA:\n"
            . "Peso de locomotora: {$this->pesoLocomotora} kg\n"
            . "Velocidad máxima: {$this->velocidadMax} km/h\n";
    }
}
