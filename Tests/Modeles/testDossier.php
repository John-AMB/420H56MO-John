<?php

require_once 'Modele/Dossier.php';

$tstDossier = new Dossier;
$Dossier = $tstDossier->getDossier(36);
echo '<h3>Test getVeterinaires : </h3>';
var_dump($Dossier);

