<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Chien.php';
require_once 'Modele/Responsable.php';
require_once 'Modele/Veterinaire.php';
require_once 'Modele/Dossier.php';

class ControleurResponsables extends Controleur{

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
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $responsable = $this->requete->getSession()->existeAttribut("responsable")
        ? $this->requete->getSession()->getAttribut("responsable")
        : null;

    $this->genererVue([
        'erreur' => $erreur,
        'responsables' => $responsables,
        'responsable' => $responsable
    ]);
    }

    public function connecter() {
        if ($this->requete->existeParametre("login") && $this->requete->existeParametre("mdp")) {
            $login = $this->requete->getParametre("login");
            $mdp = $this->requete->getParametre("mdp");
            if ($this->responsable->connecter($login, $mdp)) {
                $responsable = $this->responsable->getUtilisateur($login, $mdp);
                $this->requete->getSession()->setAttribut("responsable", $responsable);
                // Éliminer un code d'erreur éventuel
                if ($this->requete->getSession()->existeAttribut('erreur')) {
                    $this->requete->getsession()->setAttribut('erreur', '');
                }
                $this->rediriger("AdminChiens");
            } else {
                $this->requete->getSession()->setAttribut('erreur', 'mdp');
                $this->rediriger('Responsables');
            }
        } else
            throw new Exception("Action impossible : login ou mot de passe non défini");
    }

    public function deconnecter() {
        $this->requete->getSession()->detruire();
        $this->rediriger("");
    }
    public function list(){
        $responsables = $this->responsable->getResponsables();
        $this->genererVue(['responsables' => $responsables]);
    }

}