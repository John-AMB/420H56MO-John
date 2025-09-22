<?php $this->titre = 'Liste des responsables'; ?>


<a href="Responsables/creerResponsable">
    <h2 class="Accueil-link">Voulez-vous vous inscrire?</h2>
</a>

<?php foreach ($responsables as $responsable):
    ?>

    <article>
        <header>
            <h1 class="titreChien">Nom:<?= $responsable['nom'] ?></h1>
            <strong class="">Numero de telephone: <?= $responsable['numero_de_telephone'] ?></strong>
        </header>
        <p>
            <a href="Chiens/modifierChien/<?= $chien['id'] ?>"> [Supprimer]</a>
        </p>
    </article>
    <hr />
<?php endforeach; ?>  