<?php

require_once 'Modele/Chien.php';
require_once 'Modele/Responsable.php';
require_once 'Modele/Veterinaire.php';
require_once 'Vue/Vue.php';

class ControleurChien {

    private $chien;
    private $responsable;
    private $veterinaire;

    public function __construct() {
        $this->chien = new Chien();
        $this->responsable = new Responsable();
        $this->veterinaire = new Veterinaire();
    }

// Affiche la liste de tous les articles du blog
    public function chiens() {
        $chiens = $this->chien->getChiens();
        $responsables = $this->responsable->getResponsables();
        $vue = new Vue("Chiens");
        $vue->generer(['chiens' => $chiens, 'responsable' => $responsables]);
    }

// Affiche les détails sur un article
    public function chien($idChien, $erreur) {
        $chien = $this->chien->getChien($idChien);
        $responsableId = $chien['responsable_id'];
        $responsable = $this->responsable->getResponsable($responsableId);
        $veterinaireId = $chien['vet_id'];
        $veterinaire = $this->veterinaire->getVeterinaire($veterinaireId);
        $vue = new Vue("Chien");
        $vue->generer(['chien' => $chien, 'responsable' => $responsable, 'veterinaire' => $veterinaire ,'erreur' => $erreur]);
    }

    public function nouvelReq() {
        $responsables = $this->responsable->getResponsables();
        $veterinaires = $this->veterinaire->getVeterinaires();
        $vue = new Vue("Requete");
        $vue->generer(['veterinaires'=>$veterinaires, 'responsables'=>$responsables]);
    }

    public function nouveauResp() {
        $responsables = $this->responsable->getResponsables();
        $vue = new Vue("Responsable");
        $vue->generer(['responsables'=>$responsables]);
    }

// Enregistre le nouvel article et retourne à la liste des articles
    public function ajouterChien($chien) {
        $this->chien->setReqChien($chien);
        $this->chiens();
    }

// Modifier un article existant    
    public function modifierChien($id) {
        $chien = $this->chien->getChien($id);
        $vue = new Vue("ModifierChien");
        $vue->generer(['chien' => $chien]);
    }

// Enregistre l'article modifié et retourne à la liste des articles
    public function miseAJourChien($chien) {
        $this->chien->updateChien($chien);
        $this->chiens();
    }

}
