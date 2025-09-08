<?php
/*require 'Modele/Modele.php';
try {
    $chiens = getChiens();
    require 'Vue/vueAccueil.php';
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'Vue/vueErreur.php';
}
*/
require 'Controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {

        // Afficher un article
        if ($_GET['action'] == 'chien') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    chien($id, $erreur);
                } else
                    throw new Exception("Identifiant d'article incorrect");
            } else
                throw new Exception("Aucun identifiant d'article");
        } else {
            // Action mal définie
            throw new Exception("Action non valide");
        }
    }else {
        accueil();  // action par défaut
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}
