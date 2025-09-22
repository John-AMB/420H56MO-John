<?php $this->titre = 'Projet'; ?>

<div class="link-row">
    <a href="index.php?action=reqChien">
        <h2 class="Accueil-link">Faire une requete</h2>
    </a>
    <a href="index.php?action=creerResponsable">
        <h2 class="Accueil-link">Creer une compte</h2>
    </a>
</div>
<?php foreach ($chiens as $chien):
    ?>

<article>
    <header>
        <a href="index.php?action=chien&id=<?= $chien['id'] ?>">
            <h1 class="titreChien"><?= $chien['nom_chien'] ?></h1>
        </a>
        <strong class="">Sexe: <?= $chien['sexe'] ?></strong>
        <time>Date de naissance: <?= $chien['date_de_naissance'] ?></time>. Responsable: <?= $chien['responsable_nom'] ?>
    </header>
    <p>
        <a href="index.php?action=modifierChien&id=<?= $chien['id'] ?>"> [modifier ce chien]</a>
    </p>
</article>
<hr />
<?php endforeach; ?>