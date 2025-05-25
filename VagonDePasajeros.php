<?php
include_once 'Vagon.php';

class VagonDePasajeros extends Vagon {
    private int $maxPasajeros;
    private int $pasajerosTransportados;
    private float $pesoPromedioPasajero;

    public function __construct(DateTime $anioInstalacion, float $largo, float $ancho, float $pesoVacio, int $maxPasajeros){
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVacio);
        $this->maxPasajeros = $maxPasajeros;
        $this->pesoPromedioPasajero = 50;
        $this->pasajerosTransportados = 0;
    }

    // Getters
    public function getMaxPasajeros(): int {
        return $this->maxPasajeros;
    }

    public function getPasajerosTransportados(): int {
        return $this->pasajerosTransportados;
    }

    public function getPesoPromedioPasajero(): float {
        return $this->pesoPromedioPasajero;
    }

    // Setters
    public function setMaxPasajeros(int $maxPasajeros): void {
        $this->maxPasajeros = $maxPasajeros;
    }

    public function setPesoPromedioPasajero(float $pesoPromedioPasajero): void {
        $this->pesoPromedioPasajero = $pesoPromedioPasajero;
    }

    // Método para cargar pasajeros
    public function incorporarPasajeroVagon($pasajerosIngresantes): bool {
        $puedeCargar = false;
        $pasajerosMaxTemp = $this->getMaxPasajeros();
        $pasajerosTransportadosTemp = $this->getPasajerosTransportados();
        $pasajerosTemp = $pasajerosTransportadosTemp + $pasajerosIngresantes;
        $pesoPromedioPasajero = $this->getPesoPromedioPasajero();
        $pesoVacioTemp = $this->getPesoVacio();
        if ($pasajerosTemp <= $pasajerosMaxTemp) {
            $this->pasajerosTransportados = $pasajerosTemp;
            $pesoTotalPasajeros = $pasajerosTemp * $pesoPromedioPasajero;
            $this->setPesoVagon($pesoVacioTemp + $pesoTotalPasajeros);
            $puedeCargar = true;
        }
        return $puedeCargar;
    }

    // Método toString
    public function __toString(): string {
        return parent::__toString() .
               "Tipo: Vagón de pasajeros\n" .
               "Pasajeros actuales: " . $this->pasajerosTransportados . " / " . $this->maxPasajeros . "\n" .
               "Peso promedio por pasajero: " . $this->pesoPromedioPasajero . "kg\n";
    }
}
?>