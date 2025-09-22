<?php $titre = "Supprimer - " . $commentaire['titre']; ?>

<article>
    <header>
        <p><h1>
            Effacer?
        </h1>
        <?= $responsable['id'] ?>, <?= $responsable['nom'] ?> (privé? <?= $responsable['numero_de_telephone'] ?>)<br/>
        </p>
    </header>
</article>

<form action="AdminResponsables/supprimer/<?= $responsable['id'] ?>" method="post">
    <input type="submit" value="Oui" />
</form>
<form action="AdminResponsables/<?= $responsable['id'] ?>" method="post" >
    <input type="submit" value="Non" />
</form>

