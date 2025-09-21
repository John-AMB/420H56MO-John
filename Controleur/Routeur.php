<?php

require_once 'Controleur/ControleurChien.php';
/* require_once 'Controleur/ControleurCommentaire.php';
require_once 'Controleur/ControleurType.php'; */
require_once 'Vue/Vue.php';

class Routeur {

    private $ctrlChien;
    private $ctrlCommentaire;
    private $ctrlType;

    public function __construct() {
        $this->ctrlChien = new ControleurChien();
      /*   $this->ctrlCommentaire = new ControleurCommentaire();
        $this->ctrlType = new ControleurType(); */
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                // À propos
                if ($_GET['action'] == 'apropos') {
                    $this->apropos();
                } else if ($_GET['action'] == 'chien') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        // Vérifier si une erreur est présente
                        $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                        $this->ctrlChien->chien($id, $erreur);
                    } else
                        throw new Exception("Identifiant d'article non valide");
                } else if ($_GET['action'] == 'commentaire12') {
                    // Tester l'existence des paramètres requis
                    $article_id = intval($this->getParametre($_POST, 'article_id'));
                    if ($article_id != 0) {
                        $this->getParametre($_POST, 'auteur');
                        $this->getParametre($_POST, 'titre');
                        $this->getParametre($_POST, 'texte');
                        $this->getParametre($_POST, 'prive');
                        // Enregistrer le commentaire
                        $this->ctrlCommentaire->commentaire($_POST);
                    } else
                        throw new Exception("Identifiant d'article non valide");
                } else if ($_GET['action'] == 'confirmer') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $this->ctrlCommentaire->confirmer($id);
                    } else
                        throw new Exception("Identifiant de commentaire non valide");
                } else if ($_GET['action'] == 'supprimer') {
                    $id = intval($this->getParametre($_POST, 'id'));
                    if ($id != 0) {
                        $this->ctrlCommentaire->supprimer($id);
                    } else
                        throw new Exception("Identifiant de commentaire non valide");
                } else if ($_GET['action'] == 'reqChien') {
                    $this->ctrlChien->nouvelReq();
                }else if ($_GET['action'] == 'creerResponsable') {
                    $this->ctrlChien->nouveauResp();
                }else if ($_GET['action'] == 'ajouterChien') {
                    // Tester l'existence des paramètres requis
                    $this->getParametre($_POST, 'nom_chien');
                    $this->getParametre($_POST, 'sexe');
                    $this->getParametre($_POST, 'date_de_naissance');
                    $this->getParametre($_POST, 'vet_id');
                    $this->getParametre($_POST, 'responsable_id');
                    $this->ctrlChien->ajouterChien($_POST);
                } else if ($_GET['action'] == 'responsable') {
                    // Tester l'existence des paramètres requis
                    $this->getParametre($_POST, 'nom');
                    $this->getParametre($_POST, 'numero_de_telephone');
                    $this->ctrlChien->responsable($_POST);
                }
                else if ($_GET['action'] == 'miseAJourChien') {
                    // Tester l'existence des paramètres requis
                    $id = intval($this->getParametre($_POST, 'id'));
                    if ($id != 0) {

                        //Vérifier l'existence des paramètres
                        $this->getParametre($_POST, 'nom_chien');
                        $this->getParametre($_POST, 'sexe');
                        $this->getParametre($_POST, 'date_de_naissance');
                        $this->getParametre($_POST, 'vet_id');
                        $this->getParametre($_POST, 'responsable_id');
                        // Enregistrer l'article
                        $this->ctrlChien->miseAJourChien($_POST);

                    } else
                        throw new Exception("Identifiant de chien non valide");
                } else if ($_GET['action'] == 'modifierChien') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $this->ctrlChien->modifierChien($id);
                    } else
                        throw new Exception("Identifiant d'article non valide");
                } else if ($_GET['action'] == 'quelsTypes') {
                    $term = $this->getParametre($_GET, 'term');
                    $this->ctrlType->quelsTypes($term);
                } else {
                    throw new Exception("Action non valide");
                }
            } else // aucune action définie : affichage des articles par défaut
                $this->ctrlChien->chiens();
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une explication de l'application
    private function apropos() {
        $vue = new Vue("Apropos");
        $vue->generer();
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else
            throw new Exception("Paramètre '$nom' absent");
    }

}