<?php $titre = 'Projet'; ?>

<?php ob_start(); ?>
<?php foreach ($chiens as $chien):
    ?>
    <article>
        <header>
            <a href="<?= "chien.php?id=" . $chien['id'] ?>">
                <h1 class="titreChien"><?= $chien['nom_chien'] ?></h1>
            </a>
           Date de naissance: <time><?= $chien['date_de_naissance'] ?></time>, 
           sexe: <?= $chien['sexe'] ?>
        </header>
    </article>
    <hr />
<?php endforeach; ?>    
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>