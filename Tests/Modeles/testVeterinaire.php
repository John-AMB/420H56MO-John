<?php

require_once 'Modele/Veterinaire.php';

$tstVet = new Veterinaire;
$vets = $tstVet->getVeterinaires();
echo '<h3>Test getVeterinaires : </h3>';
var_dump($vets->rowCount());

echo '<h3>Test getVeterinaires : </h3>';
$vet =  $tstVet->getVeterinaire(1);
var_dump($vet);