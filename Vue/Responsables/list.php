<?php foreach ($responsables as $responsable):
    ?>

    <article>
        <header>
            <h1 class="titreChien">Nom: <?= $responsable['nom'] ?></h1>
        </header>
    </article>
    <hr />
<?php endforeach; ?>