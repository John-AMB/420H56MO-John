<?php ?>
<?php $titre = 'Requete'; ?>

<header>
    <h1 id="titre">Ajouter une requete :</h1>
</header>

<form action="index.php?action=ajouterChien" method="post">
    <h2>Faire une requete</h2>
    <p>
        <label for="nom_chien">Nom de chien</label> :
        <input type="text" name="nom_chien" id="nom_chien" /><br />

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
