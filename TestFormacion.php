<?php
include 'Locomotora.php';
include 'Formacion.php';
include 'Vagon.php';
include 'VagonDeCarga.php';
include 'VagonDePasajeros.php';

$locomotora1 = new Locomotora (188, 140);

$vagon1 = new VagonDePasajeros(new DateTime(), 22.0, 3.0, 15000.0, 30);
$vagon1->incorporarPasajeroVagon(25);

$vagonCarga = new VagonDeCarga(new DateTime(), 18.0, 3.0, 15000.0, 55000.0);

$vagon = new VagonDePasajeros(new DateTime(), 22.0, 3.0, 15000.0, 50);
$vagon->incorporarPasajeroVagon(50);

$vagones = [];
array_push($vagones, $vagon1, $vagonCarga, $vagon);

$formacion = new Formacion($locomotora1, $vagones, 4);

$info = $formacion->incorporarPasajeroFormacion(6);

if ($info === true){
    echo "Se pudio ";
} else { 
    echo"No se pudio"; 
}

print_r($vagones);

$info1 = $formacion->incorporarPasajeroFormacion(14);

if ($info1 === true){
    echo "Se pudio \n ";
} else { 
    echo"No se pudio\n"; 
}

$info2 = $formacion->promedioPasajeroFormacion();

echo "el promedio es de $info2 \n";

$info4 = $formacion->pesoFormacion();
echo "El peso de la Formacion es de $info4";

?>
