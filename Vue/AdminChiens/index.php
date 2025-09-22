<?php $this->titre = 'Le Blogue du prof'; ?>

<div class="link-row">
    <a href="Adminchiens/nouveauChien">
        <h2 class="Accueil-link">Ajouter un article</h2>
    </a>
    <a href="AdminResponsables">
        <h2 class="Accueil-link">Ceux qui se sont inscrits</h2>
    </a>
</div>

<?php foreach ($chiens as $chien):
    ?>

    <article>
        <header>
            <a href="Adminchiens/chien/<?= $chien['id'] ?>">
                <h1 class="titreChien"><?= $chien['nom_chien'] ?></h1>
            </a>
            <strong class="">Sexe: <?= $chien['sexe'] ?></strong>
            <time>Date de naissance: <?= $chien['date_de_naissance'] ?></time>. Responsable: <?= $chien['responsable_nom'] ?>
        </header>
        <p>
            <a href="Adminchiens/modifierChien/<?= $chien['id'] ?>"> [modifier ce chien]</a>
        </p>
    </article>
    <hr />
<?php endforeach; ?>    