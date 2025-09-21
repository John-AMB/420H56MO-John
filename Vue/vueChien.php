<?php $titre = "Nom de chien - " . $chien['nom_chien']; ?>

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

<form action="index.php?action=reqChien" method="post">
    <h2>Faire une requete</h2>
    <p>
        <label for="nom">Nom de chien</label> : <input type="text" name="nom" id="nom" /><br />
        
        <label for="texte">Le genre de chien</label> :  
        <input type="radio" name="sexe" value="male" required/>
        <label for="male">Mâle</label>
        <input type="radio" name="sexe" value="femelle" required/>
        <label for="femelle">Femelle</label></br>

        <label for="date_de_naissance">Date de naissance du chien :</label>
        <input type="date" name="date_de_naissance" id="date_de_naissance" required><br />

        <label for="vet_id">Vétérinaire :</label>
        <select name="vet_id" id="vet_id" required>
        <option value="">-- Sélectionnez un vétérinaire --</option>
        <?php foreach ($veterinaires as $vet): ?>
            <option value="<?= htmlspecialchars($vet['id']) ?>">
            <?= htmlspecialchars($vet['nom']) ?>
            </option>
        <?php endforeach; ?>

        </select><br />
        <label for="responsable_id">Responsable :</label>
        <select name="responsable_id" id="responsable" required>
        <option value="">-- Sélectionnez votre nom --</option>
        <?php foreach ($responsables as $responsable): ?>
            <option value="<?= htmlspecialchars($responsable['id']) ?>">
            <?= htmlspecialchars($responsable['nom']) ?>
            </option>
        <?php endforeach; ?>
        </select><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

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


<?php require 'gabarit.php'; ?>

