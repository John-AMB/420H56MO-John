<?php
require 'Modele.php';
try {
    $chiens = getChiens();
    require 'vueAccueil.php';
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}
