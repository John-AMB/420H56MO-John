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
        $this->genererVue(['responsables' => $responsables]);
    }

   public function creerResponsable() {
        $this->genererVue();
    }
    public function ajouterResponsable(){
        $responsable['nom'] = $this->requete->getParametre('nom');
        $responsable['numero_de_telephone'] = $this->requete->getParametre('numero_de_telephone');
        
        $this->responsable->setResponsable($responsable);
        
        $this->executerAction('index');
    }
}