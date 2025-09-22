<?php

require_once 'Framework/Controleur.php';

/**
 * Classe parente des contrôleurs soumis à authentification
 *
 * @author Baptiste Pesquet
 */
abstract class ControleurAdmin extends Controleur {

    private $responsable;

    public function executerAction($action) {
        // Vérifie si les informations utilisateur sont présents dans la session
        // Si oui, l'utilisateur s'est déjà authentifié : l'exécution de l'action continue normalement
        // Si non, l'utilisateur est renvoyé vers le contrôleur de connexion
        if ($this->requete->getSession()->existeAttribut("responsable")){
            $this->responsable = $this->requete->getSession()->getAttribut("responsable");
            parent::executerAction($action);
        } else {
            $this->rediriger('Responsables');
        }
    }

    public function genererVue($donneesVue = array()) {
        // Ajouter l'utilisateur en session aux données de la vue
        $donneesVue['responsable'] = $this->responsable;
        parent::genererVue($donneesVue);
    }

}
