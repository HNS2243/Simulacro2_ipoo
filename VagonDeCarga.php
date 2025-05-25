<?php
include_once 'Vagon.php';

class VagonDeCarga extends Vagon {
    private float $pesoMaximoTransporte;
    private float $pesoCarga;
    private float $indice;

    public function __construct(DateTime $anioInstalacion, float $largo, float $ancho, float $pesoVacio, float $pesoMaximoTransporte) {
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVacio);
        $this->pesoMaximoTransporte = $pesoMaximoTransporte;
        $this->indice = 0;
    }

    // Getters
    public function getPesoMaximoTransporte(): float {
        return $this->pesoMaximoTransporte;
    }

    public function getPesoCarga(): float {
        return $this->pesoCarga;
    }
    public function getIndice(): float {
        return $this->indice;
    }

    // Setters
    public function setPesoMaximoTransporte(float $pesoMaximoTransporte): void {
        $this->pesoMaximoTransporte = $pesoMaximoTransporte;
    }
    public function setIndice($pesoCarga){
        $indice = $pesoCarga * .20;
        $this->indice = $indice;
    }

    public function incorporarCargaVagon(float $pesoCarga): bool {
        $pudio = false;
        $this->setIndice($pesoCarga);
        $indice = $this->getIndice();
        $pesoCargaFinal = $pesoCarga + $indice;
        $pesoCargaMax = $this->getPesoMaximoTransporte();
        if ($pesoCargaFinal <= $pesoCargaMax){
        $this->pesoCarga = $pesoCargaFinal;
        $this->calcularPesoVagon($pesoCargaFinal); // actualiza el peso total
        $pudio = true;
        }
        return $pudio;
    }

    // Redefinición del método __toString
    public function __toString(): string {
        return parent::__toString() .
           "Peso máximo de carga: " . $this->pesoMaximoTransporte . "kg\n" .
           "Peso de la carga actual (sin índice): " . ($this->pesoCarga - $this->indice) . "kg\n" .
           "Índice de carga (20%): " . $this->indice . "kg\n" .
           "Peso total de carga (con índice): " . $this->pesoCarga . "kg\n";
    }
}
?>
