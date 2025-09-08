<?php
    require_once ('Modele/Modele.php');
    $veterinaires = getVeterinaires();
?>

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

<form action="commentaire.php" method="post">
    <h2>Faire une requete</h2>
    <p>
        <label for="auteur">Nom de chien</label> : <input type="text" name="auteur" id="auteur" /><br />
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


        <label for="texte">Commentaire</label> :  <textarea type="text" name="texte" id="texte" >Écrivez votre commentaire ici</textarea><br />
        <input type="hidden" name="article_id" value="<?= $article['id'] ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>