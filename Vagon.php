1. Se registra la siguiente información: año de instalación, largo, ancho, peso del vagón vacío.
Si se trata de un vagón de pasajeros también se almacena la cantidad máxima de pasajeros que puede
transportar, la cantidad de pasajeros que está transportando y el peso promedio de los pasajeros. Es importante
tener en cuenta que la variable de instancia que representa el peso del vagón se calcula de acuerdo a la
cantidad de pasajeros que se está transportando y considerando un peso promedio por pasajero de 50 Kilos..
Si se trata de un vagón de carga se almacena el peso máximo que puede transportar y el peso de su carga
transportada. El peso del vagón va a depender del peso de su carga más un índice que coincide con un 20 % del
peso de la carga, dicho índice se guarda en cada vagón de carga
<?php
class Vagon {
    private DateTime $anioInstalacion;
    private float    $largo;
    private float    $ancho;
    private float    $pesoVacio;
    private int      $pasajeroMax;
    private int      $pasajeroActual;
    private float    $pesoPromedioP = 50;
    private float    $pesoMaxTrans;
    private float    $pesoCargaActual;
    private float    $pesoVagon;
    private int      $tipo;

    public function __construct($anioInstalacion, $largo, $ancho, $pesoVacio, $tipo, $pasajeroMax, $pesoMaxTrans){
        $this->anioInstalacion = $anioInstalacion;
        $this->largo = $largo;
        $this->ancho = $ancho;
        $this->pesoVacio = $pesoVacio;
        $this->tipo = $tipo;
        $this->pasajeroMax = $pasajeroMax;
        $this->pesoMaxTrans = $pesoMaxTrans;
        }

    // Getters
public function getAnioInstalacion(): DateTime {
    return $this->anioInstalacion;
}

public function getLargo(): float {
    return $this->largo;
}

public function getAncho(): float {
    return $this->ancho;
}

public function getPesoVacio(): float {
    return $this->pesoVacio;
}

public function getPasajeroMax(): int {
    return $this->pasajeroMax;
}

public function getPasajeroActual(): int {
    return $this->pasajeroActual;
}

public function getPesoPromedioP(): float {
    return $this->pesoPromedioP;
}

public function getPesoMaxTrans(): float {
    return $this->pesoMaxTrans;
}

public function getPesoCargaActual(): float {
    return $this->pesoCargaActual;
}

public function getPesoVagon(): float {
    return $this->pesoVagon;
}

public function getTipo(): int {
    return $this->tipo;
}

// Setters
public function setAnioInstalacion(DateTime $anioInstalacion): void {
    $this->anioInstalacion = $anioInstalacion;
}

public function setLargo(float $largo): void {
    $this->largo = $largo;
}

public function setAncho(float $ancho): void {
    $this->ancho = $ancho;
}

public function setPesoVacio(float $pesoVacio): void {
    $this->pesoVacio = $pesoVacio;
}

public function setPasajeroMax(int $pasajeroMax): void {
    $this->pasajeroMax = $pasajeroMax;
}

public function setPasajeroActual(int $pasajeroActual): void {
    $this->pasajeroActual = $pasajeroActual;
}

public function setPesoPromedioP(float $pesoPromedioP): void {
    $this->pesoPromedioP = $pesoPromedioP;
}

public function setPesoMaxTrans(float $pesoMaxTrans): void {
    $this->pesoMaxTrans = $pesoMaxTrans;
}

public function setPesoCargaActual(float $pesoCargaActual): void {
    $this->pesoCargaActual = $pesoCargaActual;
}

public function setPesoVagon(float $pesoVagon): void {
    $this->pesoVagon = $pesoVagon;
}

public function setTipo(int $tipo): void {
    $this->tipo = $tipo;
}


    public function incorporarPasajeroVagon($pasajerosIngresantes){
        $pudio = false;
        $pasajeroTempMax = $this->getPasajeroMax();
        $tipoTemp = $this->getTipo();
        if ($tipoTemp == 1){
            if ($pasajerosIngresantes <= $pasajeroTempMax){
                $this->setPasajeroActual($pasajerosIngresantes);
                $pudio = true;
            }
        }
        return $pudio;
    }
    


    public function incorporarCargaVagon($cantCarga){
        $pudio = false;
        $cargaTempMax = $this->getPesoMaxTrans();
        $tipoTemp = $this->getTipo();
        if ($tipoTemp == 2){
            if ($cantCarga <= $cargaTempMax){
                $this->setPesoCargaActual($cantCarga);
                $pudio = true;
            }
        }
    return $pudio;
    } 
 

    public function calcularPesoVagon(){
        $pesoFinal = -1;
        $tipoTemp = $this->getTipo();
        $pesoVacioTemp = $this->getPesoVacio();
        if($tipoTemp == 1 ){
            $pesoPasajeros = $this->getPasajeroActual();
            $pesoPasajeros = $pesoPasajeros * 50;
            $pesoFinal = $pesoPasajeros + $pesoVacioTemp;
        }  if ($tipoTemp == 2 ) {
            $pesoCargaActualTemp = $this->getPesoCargaActual();
            $pesoFinal = $pesoCargaActualTemp + $pesoVacioTemp;
        }
        $this->setPesoVagon($pesoFinal);
        return $pesoFinal;      
    }

    public function __toString(): string {
    $tipoTexto = $this->tipo == 1 ? "Pasajeros" : ($this->tipo == 2 ? "Carga" : "Desconocido");

    $info = "VAGÓN TIPO: {$tipoTexto}\n";
    $info .= "Año de instalación: " . $this->anioInstalacion->format('Y') . "\n";
    $info .= "Dimensiones: Largo {$this->largo} m, Ancho {$this->ancho} m\n";
    $info .= "Peso vacío: {$this->pesoVacio} kg\n";

    if ($this->tipo == 1) {
        $info .= "Pasajeros: {$this->pasajeroActual}/{$this->pasajeroMax}\n";
        $info .= "Peso promedio por pasajero: {$this->pesoPromedioP} kg\n";
    } elseif ($this->tipo == 2) {
        $info .= "Carga actual: {$this->pesoCargaActual} kg (máx: {$this->pesoMaxTrans} kg)\n";
        $info .= "Índice adicional (20% carga): " . number_format($this->pesoCargaActual * 0.2, 2) . " kg\n";
    }

    $info .= "Peso total del vagón: {$this->pesoVagon} kg\n";
    return $info;
}

}