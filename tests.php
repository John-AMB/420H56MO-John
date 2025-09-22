<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleChien') {
        require 'Tests/Modeles/testChien.php';
    } else if ($_GET['test'] == 'modeleVeterinaire') {
        require 'Tests/Modeles/testVeterinaire.php';
    } else if ($_GET['test'] == 'modeleResponsable') {
        require 'Tests/Modeles/testResponsable.php';
    } else if ($_GET['test'] == 'modeleDossier') {
        require 'Tests/Modeles/testDossier.php';
    }else if ($_GET['test'] == 'vueChiens') {
        require 'Tests/Vues/testVueChiens.php';
    } else if ($_GET['test'] == 'vueConfirmer') {
        require 'Tests/Vues/testVueConfirmer.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleChien">Chien</a>
    </li>
    <li>
        <a href="tests.php?test=modeleVeterinaire">Veterinaire</a>
    </li>
    <li>
        <a href="tests.php?test=modeleResponsable">Responsable</a>
    </li>
    <li>
        <a href="tests.php?test=modeleDossier">Dossier</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueChiens">Chiens</a>
    </li>
    <li>
        <a href="tests.php?test=vueConfirmer">Confirmer</a>
    </li>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
</ul>
