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

<form action="commentaire.php" method="post">
    <h2>Faire une requete</h2>
    <p>
        <label for="nom">Nom de chien</label> : <input type="text" name="auteur" id="auteur" /><br />
        <label for="texte">Le genre de chien</label> :  
        <input type="radio" name="genre" value="sexe" required/>
        <label for="male">Mâle</label>
        <input type="radio" name="genre" value="sexe" required/>
        <label for="femelle">Femelle</label><br />
        <label for="date_de_naissance">Date de naissance du chien :</label>
        <input type="date" name="date_de_naissance" id="date_de_naissance" required><br />

        <label for="vet_id">Choisissez un vétérinaire :</label>
        <select name="vet_id" id="vet_id" required>
        <option value="">-- Sélectionnez un vétérinaire --</option>
        <?php foreach ($veterinaires as $vet): ?>
            <option value="<?= htmlspecialchars($vet['id']) ?>">
            <?= htmlspecialchars($vet['nom']) ?>
            </option>
        <?php endforeach; ?>
        </select><br />

        <label for="responsable">La personne à contacter</label> :  <textarea type="text" name="texte" id="texte" ></textarea><br />
        <label for="numero">Numero de telephone</label> :  <textarea type="text" name="texte" id="texte" ></textarea><br />
        

        <input type="hidden" name="article_id" value="<?= $article['id'] ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>

