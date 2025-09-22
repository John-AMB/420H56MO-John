<?php

require_once 'Modele/Chien.php';

$tstChien = new Chien;
$chiens = $tstChien->getChiens();
echo '<h3>Test getChiens : </h3>';
var_dump($chiens->rowCount());

echo '<h3>Test getChien : </h3>';
$chien =  $tstChien->getChien(36);
var_dump($chien);