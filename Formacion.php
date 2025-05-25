<?php
class Formacion {
    private array $vagones; //Tiene que ser unica.
    private Locomotora $locomotora;
    private int $maxVagones;

    public function __construct(Locomotora $locomotora, array $vagones, int $maxVagones) {
        $this->locomotora = $locomotora;
        $this->vagones = $vagones;
        $this->maxVagones = $maxVagones;
    }
    
    //Funciones GET. 

    public function getLocomotora(): Locomotora {
        return $this->locomotora;
    }
    public function getVagones(): array {
        return $this->vagones;
    }
    public function getMaxVagones(): int {
        return $this->maxVagones;
    }
    
    //Funciones SET que no tienen ninguna validacion, un peligro.

    public function setLocomotora(Locomotora $locomotora){
        $this->locomotora = $locomotora;
    }
    public function setVagones(array $vagones){
        $this->vagones = $vagones;
    }
    public function setMaxVagones(int $maxVagones){
        $this->maxVagones = $maxVagones;
    }

    public function incorporarPasajeroFormacion($pasajerosAIncorporar){
        $pudio = false;
        $i = 0;
        $vagonesTemp = $this->getVagones();
        $cantVagones = count($vagonesTemp);
      
        while ($i < $cantVagones && !$pudio) {
            $vagon = $vagonesTemp[$i];
            if (is_a($vagon, 'VagonDePasajeros')) {
            /** @var VagonDePasajeros $vagon */
            $pasajerosDisponibles = $vagon->getMaxPasajeros() - $vagon->getPasajerosTransportados();

            if ($pasajerosAIncorporar <= $pasajerosDisponibles) {
                // Se intenta incorporar, se usa el método del vagón
                $pudio = $vagon->incorporarPasajeroVagon($pasajerosAIncorporar);
            }
        }
        $i++;
    }
    return $pudio;
    }


    public function incorporarVagonFormacion(Vagon $vagon){
        $pudio = false;
        $maxVagonesTemp = $this->getMaxVagones();
        $vagonesTemp = $this->getVagones();
        $cantVagonesActual = count($vagonesTemp);
         if ( ($cantVagonesActual + 1) >= $maxVagonesTemp) {
            $vagonesTemp[] = $vagon;
            $pudio = true;
        }
        return $pudio;
    }

    public function promedioPasajeroFormacion() {
        $cantVagonesPasajeros = 0;
        $cantPasajerosTotal = 0;
        $vagonesTemp = $this->getVagones();
        foreach ($vagonesTemp as $vagon) {
            if (is_a($vagon, 'VagonDePasajeros')) {
            /** @var VagonDePasajeros $vagon */
            $cantVagonesPasajeros ++;
            $cantPasajerosVagon = $vagon->getPasajerosTransportados();
            $cantPasajerosTotal = $cantPasajerosTotal + $cantPasajerosVagon;
            }
        $promedioPasajeros = $cantPasajerosTotal / $cantVagonesPasajeros;
        }
        return $promedioPasajeros;
    }

    public function pesoFormacion(){
        $pesoFinal = 0;
        $pesoVagones = 0;
        $pesoLocomotora = ($this->getLocomotora())->getPeso();
        $vagonesTemp = $this->getVagones();
        foreach ($vagonesTemp as $vagon) {
            $pesoVagon = $vagon->getPesoVagon();
            $pesoVagones= $pesoVagones + $pesoVagon;
        }

        $pesoFinal = $pesoVagones + $pesoLocomotora; 
        return $pesoFinal;
    }

    //Voy a asumir que se trata de los vagones de Carga.
    public function retornarVagonSinCompletar(){  

        $vagonesTemp = $this->getVagones();
        $i = 0;
        $cantVagones = count($vagonesTemp);
        $vagonEncontrado = null;

         while ($i < $cantVagones && $vagonEncontrado === null) {
            $vagon = $vagonesTemp[$i];
                if (is_a($vagon, 'VagonDeCarga')) {
                     /** @var VagonDeCarga $vagon */
                     $cargaMaxTemp = $vagon->getPesoMaximoTransporte();
                     $cargaActual  = $vagon->getPesoCarga();
                if ($cargaMaxTemp > $cargaActual) {
                     $vagonEncontrado = $vagon;
                }        
            }
            $i++;
        }
        return $vagonEncontrado;
    }

    public function __toString(): string {
    $info = "Formación:\n";
    $info .= "- Locomotora: " . $this->locomotora . "\n";
    $info .= "- Cantidad de vagones: " . count($this->vagones) . "\n";
    $info .= "- Peso total de la formación: " . $this->pesoFormacion() . " kg\n";

    return $info;
    }
}
?>