<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Chien.php';
require_once 'Modele/Responsable.php';
require_once 'Modele/Veterinaire.php';
require_once 'Modele/Dossier.php';

class ControleurAdminChiens extends ControleurAdmin {

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
    public function index() {
        $chiens = $this->chien->getChiens();
        $this->genererVue(['chiens' => $chiens]);
    }

public function chien() {
        $idChien = $this->requete->getParametreId("id");
        $chien = $this->chien->getChien($idChien);

        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';

        $responsableId = $chien['responsable_id'];
        $responsable = $this->responsable->getResponsable($responsableId);
        
        $veterinaireId = $chien['vet_id'];
        $veterinaire = $this->veterinaire->getVeterinaire($veterinaireId);
        $dossier = $this->dossier->getDossier($idChien);

        $this->genererVue(['chien' => $chien, 'responsable' => $responsable, 'veterinaire' => $veterinaire ,'dossier' => $dossier,'erreur' => $erreur]);
    }

    public function ajouter() {
        $chien['nom_chien'] = $this->requete->getParametre('nom_chien');
        $chien['sexe'] = $this->requete->getParametre('sexe');
        $chien['date_de_naissance'] = $this->requete->getParametre('date_de_naissance');
        $chien['vet_id'] = $this->requete->getParametreId('vet_id');
        $chien['responsable_id'] = $this->requete->getParametreId('responsable_id');

        $this->chien->setChien($chien);

        $chienId = $this->chien->getLastInsertId();
        $this->dossier->createDossier($chienId, $chien['vet_id']);
        
        $this->executerAction('index');
    }

    public function nouveauChien() {
        $veterinaires = $this->veterinaire->getVeterinaires();
        $responsables = $this->responsable->getResponsables();
        $this->genererVue(['veterinaires' => $veterinaires,'responsables' => $responsables]);
    }
// Modifier un article existant    
    public function modifierChien() {
        $id = $this->requete->getParametreId('id');
        $chien = $this->chien->getChien($id);
        $dossier = $this->dossier->getDossier($id);
        
        $this->genererVue(['chien' => $chien, 'dossier' => $dossier]);
    }

// Enregistre l'article modifié et retourne à la liste des articles
    public function miseAJourChien() {
        $chien['id'] = $this->requete->getParametreId('id');
        $chien['nom_chien'] = $this->requete->getParametre('nom_chien');
        $chien['sexe'] = $this->requete->getParametre('sexe');
        $chien['date_de_naissance'] = $this->requete->getParametre('date_de_naissance');
        $chien['vet_id'] = $this->requete->getParametreId('vet_id');
        $chien['responsable_id'] = $this->requete->getParametreId('responsable_id');

        if ($this->requete->existeParametre('sommaire')) {
        $chien['sommaire'] = $this->requete->getParametre('sommaire');
    }

        $this->chien->updateChien($chien);

        if (isset($chien['sommaire'])) {
        $this->dossier->updateDossier($chien['id'], $chien['sommaire']);
    }
        
        $this->executerAction('index');

    }

}
