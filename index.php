<?php
require 'Modele/Modele.php';
try {
    $chiens = getChiens();
    require 'Vue/vueAccueil.php';
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'Vue/vueErreur.php';
}
