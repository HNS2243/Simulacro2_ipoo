<?php


class Vagon {   //Funcion que sera madre de otras dos funciones. 
    private DateTime $anioInstalacion;
    private float    $largo;
    private float    $ancho;
    private float    $pesoVacio;
    private float    $pesoVagon;


    public function __construct( DateTime $anioInstalacion, Float $largo, Float $ancho, Float $pesoVacio) {
        $this->anioInstalacion = $anioInstalacion;
        $this->largo           = $largo;
        $this->ancho           = $ancho;
        $this->pesoVacio       = $pesoVacio;
        $this->pesoVagon       = $pesoVacio;
    }

    // Funciones get
    public function getAnioInstalacion(): DateTime {  
        return $this->anioInstalacion;
    }
    public function getLargo(): Float {
        return $this->largo;
    }
    public function getAncho(): Float {
        return $this->ancho;
    }
    public function getPesoVacio(): Float {
        return $this->pesoVacio;
    }
    public function getPesoVagon(): Float {
        return $this->pesoVagon;
    }

    // Funciones set
    public function setPesoVagon(Float $pesoVagon){
        $this->pesoVagon = $pesoVagon;
    }
    public function setPesoVacio(Float $pesoVacio){
         $this->pesoVacio = $pesoVacio;
    }
    public function setAncho(Float $ancho){
          $this->ancho = $ancho;
    }
    public function setLargo(Float $largo){
        $this->largo = $largo;
    }
    public function setAnioInstalacion(DateTime $anioInstalacion){
        $this->anioInstalacion = $anioInstalacion;
    }
    // Funcion String
    public function __toString(): string {
    return "Vagón instalado en: " . $this->anioInstalacion->format('Y') .
           "\nDimensiones: " . $this->largo . "m (largo) x " . $this->ancho . "m (ancho)" .
           "\nPeso vacío: " . $this->pesoVacio . "kg" .
           "\nPeso actual: " . $this->pesoVagon . "kg\n";
    }
    //Funciones especificas
    public function calcularPesoVagon($pesoExtra): Float{
        $pesoFinal = $this->getPesoVagon();
        $pesoFinal = $pesoExtra + $pesoFinal;
        $this->setPesoVagon($pesoFinal);
        return $pesoFinal;
        }    
}
?>