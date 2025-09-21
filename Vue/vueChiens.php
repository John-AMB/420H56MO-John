<?php $this->titre = 'Projet'; ?>

<a href="index.php?action=reqChien">
    <h2 class="titreChien">Faire une requete</h2>
</a>
<?php foreach ($chiens as $chien):
    ?>

<article>
    <header>
        <a href="index.php?action=chien&id=<?= $chien['id'] ?>">
            <h1 class="titreChien"><?= $chien['nom_chien'] ?></h1>
        </a>
        <strong class="">Sexe:<?= $chien['sexe'] ?></strong>
        <time><?= $chien['date_de_naissance'] ?></time>, par utilisateur #<?= $chien['responsable_id'] ?>
    </header>
    <p>
        <a href="index.php?action=modifierChien&id=<?= $chien['id'] ?>"> [modifier ce chien]</a>
    </p>
</article>
<hr />
<?php endforeach; ?>