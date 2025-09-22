<?php $this->titre = "Modification de chien:" . $chien['nom_chien']; ?>

<header>
    <h1 id="titreReponses">Modifier le chien :</h1>
</header>

<form action="Chiens/miseAJourChien" method="post">
    <h2>Faire une requete</h2>
    <p>
        <label for="nom_chien">Nom de chien</label> : 
        <input type="text" name="nom_chien" id="nom_chien" value="<?= $chien['nom_chien'] ?>" /><br />

        <label for="texte">Le genre de chien</label> :  
        <input type="radio" name="sexe" value="male" <?= $chien['sexe'] === 'male' ? 'checked' : '' ?> required/>
        <label for="male">Mâle</label>
        <input type="radio" name="sexe" value="femelle" <?= $chien['sexe'] === 'femelle' ? 'checked' : '' ?> required/>
        <label for="femelle">Femelle</label></br>

        <label for="date_de_naissance">Date de naissance du chien :</label>
        <input type="date" name="date_de_naissance" id="date_de_naissance" 
               value="<?= $chien['date_de_naissance'] ?>" required><br />
        
        <label for="sommaire">Dossier de santé :</label><br />
        <textarea name="sommaire" id="sommaire" rows="6" cols="50"><?= htmlspecialchars($dossier['sommaire'] ?? '') ?></textarea>


        <input type="hidden" name="id" value="<?= $chien['id'] ?>" />
        <input type="hidden" name="vet_id" value="<?= $chien['vet_id'] ?>" />
        <input type="hidden" name="responsable_id" value="<?= $chien['responsable_id'] ?>" /><br />

    <div class="button-row">
        <input type="submit" value="Modifier" />
    </p>
</form>

<form>
    <input type="submit" value="Annuler" />
</form>
    </div>


