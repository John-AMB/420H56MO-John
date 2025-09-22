<?php

require_once 'Modele/Responsable.php';

$tstRes = new Responsable;
$responsables = $tstRes->getResponsables();
echo '<h3>Test getResponsables : </h3>';
var_dump($responsables->rowCount());

echo '<h3>Test getArticle : </h3>';
$responsable =  $tstRes->getResponsable(1);
var_dump($responsable);