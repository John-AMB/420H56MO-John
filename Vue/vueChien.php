<?php $titre = "Nom de chien - " . $chien['nom_chien']; ?>

<?php ob_start(); ?>
<article>
    <header>
        <h1 class="titreChien"><?= $chien['nom_chien'] ?></h1>
        Date de naissance: <time><?= $chien['date_de_naissance'] ?></time>, 
        Sexe: <?= $chien['sexe'] ?>
    </header>
</article>
<hr />
<header>
    <h1 id="titreVet">Veterinaire: <?= $veterinaire['nom'] ?></h1>
    <h1 id="titreVet">Maitre/Maitress: <?=$responsable['nom'] ?></h1>
</header>


<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>

