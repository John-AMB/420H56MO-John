<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Chien.php';
require_once 'Modele/Responsable.php';
require_once 'Modele/Veterinaire.php';
require_once 'Modele/Dossier.php';

class ControleurAdminResponsables extends ControleurAdmin{

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

    public function index() {
        $responsables = $this->responsable->getResponsables();
        $this->genererVue(['responsables' => $responsables]);
    }

   public function creerResponsable() {
        $this->genererVue();
    }
    public function ajouterResponsable(){
        $responsable['nom'] = $this->requete->getParametre('nom');
        $responsable['mot_de_passe'] = $this->requete->getParametre('mot_de_passe');
        $responsable['numero_de_telephone'] = $this->requete->getParametre('numero_de_telephone');
        
        
        $this->responsable->setResponsable($responsable);
        
        $this->executerAction('index');
    }

    
  
// Confirmer la suppression d'un commentaire
    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire le responsable à l'aide du modèle
        $responsable = $this->responsable->getResponsable($id);
        $this->genererVue(['responsable' => $responsable]);
    }

// Supprimer un responsable
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire le responsable afin d'obtenir le id de l'article associé
        $responsable = $this->responsable->getResponsable($id);
        // Supprimer le responsable à l'aide du modèle
        $this->responsable->deleteResponsable($id);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        $this->rediriger('AdminResponsables', 'index');
    }

    // Rétablir un commentaire
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le commentaire afin d'obtenir le id de l'article associé
        $responsable = $this->responsable->getResponsable($id);
        // Supprimer le commentaire à l'aide du modèle
        $this->responsable->restoreResponsable($id);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        $this->rediriger('AdminResponsables', 'index');
    
}
}