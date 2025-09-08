<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=dossierchiens;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

// Renvoie la liste de tous les articles, triés par identifiant décroissant
function getChiens() {
    $bdd = getBdd();
    $chiens = $bdd->query('select * from Chiens'
            . ' order by ID desc');
    return $chiens;
}

// Renvoie les informations sur un article
function getChien($idChien) {
    $bdd = getBdd();
    $chien = $bdd->prepare('select * from Chiens WHERE ID=?');
    $chien->execute(array($idChien));
    if ($chien->rowCount() == 1)
        return $chien->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun article ne correspond à l'identifiant '$idChien'");
}

// Renvoie le vet associés au chien
function getVeterinaire($vet_id) {
    $bdd = getBdd();
    $veterinaire = $bdd->prepare('select * from Veterinaires WHERE ID= ?');
    $veterinaire->execute(array($vet_id));
    if ($veterinaire->rowCount() ==1)
        return $veterinaire->fetch();
    else
        throw new Exception("Aucun veterinaire ne correspond pas au chien");
}
function getVeterinaires(){
    $bdd = getBdd();
    $veterinaires = $bdd->query('SELECT id, nom from Veterinaires ORDER BY nom');
    return $veterinaires->fetchAll(PDO::FETCH_ASSOC);
}

// Renvoie le responsable de chien
function getResponsable($res_id) {
    $bdd = getBdd();
    $responsable = $bdd->prepare('SELECT * FROM responsables WHERE id= ?');
    $responsable->execute(array($res_id));
    if ($responsable->rowCount() ==1)
        return $responsable->fetch();
    else if ($responsable->rowCount() > 1)
        throw new Exception("test2");
    else
        throw new Exception("Aucun responsable ne correspond pas au chien");
}

// Ajoute un commentaire associés à un article
function setCommentaire($commentaire) {
    $bdd = getBdd();
    $commentaires = $bdd->prepare('INSERT INTO commentaires (article_id, date, auteur, titre, texte, prive) VALUES(?, NOW(), ?, ?, ?, ?)');
    $commentaires->execute(array($commentaire['article_id'], $commentaire['auteur'], $commentaire['titre'], $commentaire['texte'], $commentaire['prive']));
    return $commentaires;
}


//function createResponsable($nom, $telephone) {
    //$bdd = getBdd();
    //$responsable = $bdd->prepare('INSERT INTO responsables (nom, numero_de_telephone) VALUES(?,?')
    //$sql = "INSERT INTO responsables (nom, numero_de_telephone) VALUES (?, ?)";
   // $responsable->execute(array())
    //$stmt = $bdd->prepare($sql);
    //$stmt->execute([$nom, $telephone]);
//}