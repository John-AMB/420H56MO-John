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
</header>


<form action="commentaire.php" method="post">
    <h2>Ajouter un commentaire</h2>
    <p>
        <label for="auteur">Auteur</label> : <input type="text" name="auteur" id="auteur" /><br />
        <label for="texte">Titre</label> :  <input type="text" name="titre" id="titre" /><br />
        <label for="texte">Commentaire</label> :  <textarea type="text" name="texte" id="texte" >Écrivez votre commentaire ici</textarea><br />
        <label for="prive">Privé?</label><input type="checkbox" name="prive" />
        <input type="hidden" name="article_id" value="<?= $article['id'] ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>

