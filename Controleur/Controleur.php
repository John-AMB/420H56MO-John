<?php

require 'Modele/Modele.php';

function accueil() {
    $chiens = getChiens();
    $vets=getVeterinaires();
    require 'Vue/vueAccueil.php';
}

function chien($id, $erreur) {
    $chien = getChien($id);
    $veterinaires = getVeterinaires();
    $responsables= getResponsables();
    $vet_id = $chien['vet_id'];
    $veterinaire = getVeterinaire($vet_id);
    $res_id = $chien['responsable_id'];
    $responsable = getResponsable($res_id);
    require 'Vue/vueChien.php';
}

function responsable($responsable) {
    setResponsable($responsable);
    accueil();
}

function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}

/*
function commentaire($commentaire) {
    
        // Ajouter le commentaire à l'aide du modèle
        setCommentaire($commentaire);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        header('Location: index.php?action=article&id=' . $commentaire['article_id']);
    
}

// Confirmer la suppression d'un commentaire
function confirmer($id) {
    // Lire le commentaire à l'aide du modèle
    $commentaire = getCommentaire($id);
    require 'Vue/vueConfirmer.php';
}

// Supprimer un commentaire
function supprimer($id) {
    // Lire le commentaire afin d'obtenir le id de l'article associé
    $commentaire = getCommentaire($id);
    // Supprimer le commentaire à l'aide du modèle
    deleteCommentaire($id);
    //Recharger la page pour mettre à jour la liste des commentaires associés
    header('Location: index.php?action=article&id=' . $commentaire['article_id']);
}
    */