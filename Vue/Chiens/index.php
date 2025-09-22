<?php $this->titre = 'Le Blogue du prof'; ?>
<a href="Responsables/list">
    <h2 class="Accueil-link">Voir les membres</h2>
</a>
<?php foreach ($chiens as $chien):
    ?>
    <article>
        <header>
            <h1 class="titreChien"><?= $chien['nom_chien'] ?></h1>
            <strong class="">Sexe: <?= $chien['sexe'] ?></strong>
            <time>Date de naissance: <?= $chien['date_de_naissance'] ?></time>.
    </article>
    <hr />
<?php endforeach; ?>    