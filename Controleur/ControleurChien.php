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
        $vue = new Vue("Chiens");
        $vue->generer(['chiens' => $chiens]);
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

    public function nouvelArticle() {
        $vue = new Vue("Ajouter");
        $vue->generer();
    }

// Enregistre le nouvel article et retourne à la liste des articles
    public function ajouter($article) {
        $this->article->setArticle($article);
        $this->articles();
    }

// Modifier un article existant    
    public function modifierArticle($id) {
        $article = $this->article->getArticle($id);
        $vue = new Vue("ModifierArticle");
        $vue->generer(['article' => $article]);
    }

// Enregistre l'article modifié et retourne à la liste des articles
    public function miseAJourArticle($article) {
        $this->article->updateArticle($article);
        $this->articles();
    }

}
