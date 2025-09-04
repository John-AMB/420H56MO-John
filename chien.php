<?php

require 'Modele.php';

try {
    if (isset($_GET['id'])) {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_GET['id']);
        if ($id != 0) {
            $chien = getChien($id);
            $vet_id=$chien['vet_id'];
            $veterinaire = getVeterinaire($vet_id);
            require 'vueChien.php';
        } else
            throw new Exception("Identifiant de chien incorrect");
    } else
        throw new Exception("Aucun identifiant de chien");
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}
