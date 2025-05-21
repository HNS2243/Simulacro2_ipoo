<?php

class Formacion extends Vagon {
    private Locomotora $locomotora;
    private array $vagones;
    private int $maxVagones;

    public function __construct(
        DateTime $anioInstalacion,
        float $largo,
        float $ancho,
        float $pesoVacio,
        int $tipo, // Puede usarse para describir si es especial
        Locomotora $locomotora,
        int $maxVagones
    ) {
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVacio, $tipo, 0, 0);
        $this->locomotora = $locomotora;
        $this->maxVagones = $maxVagones;
        $this->vagones = [];
    }

    // Getters
    public function getLocomotora(): Locomotora {
        return $this->locomotora;
    }

    public function getVagones(): array {
        return $this->vagones;
    }

    public function getMaxVagones(): int {
        return $this->maxVagones;
    }

    // Agregar un vagón
    public function agregarVagon(Vagon $vagon): bool {
        if (count($this->vagones) < $this->maxVagones) {
            $this->vagones[] = $vagon;
            return true;
        }
        return false;
    }

    // Redefinir calcularPesoVagon: suma de todos los vagones + locomotora + pesoVacio de la formación
    public function calcularPesoVagon(): float {
        $pesoTotal = $this->getPesoVacio(); // peso vacío de la formación
        $pesoTotal += $this->locomotora->calcularPesoVagon(); // peso de la locomotora

        foreach ($this->vagones as $vagon) {
            $pesoTotal += $vagon->calcularPesoVagon();
        }

        $this->setPesoVagon($pesoTotal); // guarda el total
        return $pesoTotal;
    }

    // Mostrar info
    public function __toString(): string {
        $info = "FORMACIÓN DE TREN (hereda de Vagon)\n";
        $info .= "Máximo de vagones: {$this->maxVagones}\n";
        $info .= "Cantidad actual de vagones: " . count($this->vagones) . "\n";
        $info .= "--- LOCOMOTORA ---\n" . $this->locomotora . "\n";

        foreach ($this->vagones as $i => $vagon) {
            $info .= "--- Vagón #" . ($i + 1) . " ---\n" . $vagon . "\n";
        }

        $info .= "Peso total de formación: " . $this->calcularPesoVagon() . " kg\n";
        return $info;
    }
}
