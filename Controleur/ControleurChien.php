<?php

require_once 'Modele/Chien.php';
require_once 'Modele/Responsable.php';
require_once 'Modele/Veterinaire.php';
require_once 'Modele/Dossier.php';
require_once 'Vue/Vue.php';

class ControleurChien {

    private $chien;
    private $responsable;
    private $veterinaire;
    private $dossier;

    public function __construct() {
        $this->chien = new Chien();
        $this->responsable = new Responsable();
        $this->veterinaire = new Veterinaire();
        $this->dossier = new Dossier();
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
        $dossier = $this->dossier->getDossier($idChien);

        $vue = new Vue("Chien");
        $vue->generer(['chien' => $chien, 'responsable' => $responsable, 'veterinaire' => $veterinaire ,'dossier' => $dossier,'erreur' => $erreur]);
    }

    public function nouvelReq() {
        $responsables = $this->responsable->getResponsables();
        $veterinaires = $this->veterinaire->getVeterinaires();
        $vue = new Vue("Requete");
        $vue->generer(['veterinaires'=>$veterinaires, 'responsables'=>$responsables]);
    }

    //make into a new file later
    public function nouveauResp() {
        $responsables = $this->responsable->getResponsables();
        $vue = new Vue("Responsable");
        $vue->generer(['responsables'=>$responsables]);
    }

// Enregistre le nouvel article et retourne à la liste des articles
    public function ajouterChien($chien) {
        $this->chien->setReqChien($chien);

        //on retrouve le id de dernier chien cree
        $chienId = $this->chien->getLastInsertId();

        //creer le dossier
        $this->dossier->createDossier($chienId, $chien['vet_id']);
        
        $this->chiens();
    }

// Modifier un article existant    
    public function modifierChien($id) {
        $chien = $this->chien->getChien($id);
        $dossier = $this->dossier->getDossier($id);
        $vue = new Vue("ModifierChien");
        $vue->generer(['chien' => $chien, 'dossier' => $dossier]);
    }

// Enregistre l'article modifié et retourne à la liste des articles
    public function miseAJourChien($chien) {
        $this->chien->updateChien($chien);

        //modifier le sommaire aussi
        if (isset($chien['sommaire'])) {
        $this->dossier->updateDossier($chien['id'], $chien['sommaire']);
    }

        $this->chiens();
    }

}
