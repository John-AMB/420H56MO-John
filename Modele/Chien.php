<?php

require_once 'Modele/Modele.php';

/**
 * Fournit les services d'accès aux articles 
 * 
 * @author André Pilon
 */
class Chien extends Modele {

// Renvoie la liste de tous les articles, triés par identifiant décroissant
    public function getChiens() {
        $sql = 'select * from Chiens'
                . ' order by ID desc';
        $chiens = $this->executerRequete($sql);
        return $chiens;
    }

    /*
    function getChiens() {
    $bdd = getBdd();
    $chiens = $bdd->query('select * from Chiens'
            . ' order by ID desc');
    return $chiens;
}*/

// Renvoie les informations sur un article
    function getChien($idChien) {
        $sql = 'select * from Chiens'
                . ' where ID=?';
        $chien = $this->executerRequete($sql, [$idChien]);
        if ($chien->rowCount() == 1) {
            return $chien->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun article ne correspond à l'identifiant '$idChien'");
        }
    }
/*
// Renvoie les informations sur un article
function getChien($idChien) {
    $bdd = getBdd();
    $chien = $bdd->prepare('select * from Chiens WHERE ID=?');
    $chien->execute(array($idChien));
    if ($chien->rowCount() == 1)
        return $chien->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun article ne correspond à l'identifiant '$idChien'");
}*/
 // Ajout d'un nouvel article
    public function setReqChien($chien) {
        $sql = 'INSERT INTO chiens (nom_chien, sexe, date_de_naissance, vet_id, responsable_id) VALUES(?, ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [$chien['nom'], $chien['sexe'], $chien['date_de_naissance'], $chien['vet_id'], $chien['responsable_id']]);
        return $result;
    }
    

    /*function setReqChien($req) {
    $bdd = getBdd();
    $reqs = $bdd->prepare('INSERT INTO chiens (nom_chien, sexe, date_de_naissance, vet_id, responsable_id) VALUES (?, ?, ?, ?, ?)');
    $reqs->execute(array(
        $req['nom'],
        $req['sexe'],
        $req['date_de_naissance'],
        $req['vet_id'],
        $req['responsable_id']
    ));
}*/
    // Met à jour un article
    public function updateChien($chien) {
        $sql = 'UPDATE chiens'
                . ' SET nom_chien = ?, sexe = ?, date_de_naissance = ?, vet_id, responsable_id'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$article['titre'], $article['sous_titre'], $article['utilisateur_id'], $article['texte'], $article['type'], $article['id']]);
        return $result;
    }
    
}