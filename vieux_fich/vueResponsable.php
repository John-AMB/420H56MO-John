<?php ?>
<?php $titre = 'Responsable'; ?>

<header>
    <h1 id="titre">Creer une compte :</h1>
</header>

<form action="index.php?action=responsable" method="post">
    <h2>Créer un compte (Responsable)</h2>
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="numero_de_telephone">Téléphone :</label>
    <input type="text" id="numero_de_telephone" name="numero_de_telephone" 
       pattern="\(\d{3}\) \d{3}-\d{4}"
       title="Format attendu: (123) 456-7891" 
       required>

    <input type="hidden" name="chien_id" value="<?= $chien['id'] ?>">
    <button type="submit">Créer</button>
</form>


<?php foreach ($responsables as $responsable):
    ?>

    <article>
        <header>
            <h1 class="titreChien">Nom: <?= $responsable['nom'] ?></h1>
            <strong class="">Numero de telephone: <?= $responsable['numero_de_telephone'] ?></strong>
        </header>
        <p>
            <a href="Chiens/modifierChien/<?= $responsable['id'] ?>"> [Supprimer]</a>
        </p>
    </article>
    <hr />
<?php endforeach; ?