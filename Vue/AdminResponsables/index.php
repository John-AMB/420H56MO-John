<?php $this->titre = 'Liste des responsables'; ?>


<a href="AdminResponsables/creerResponsable">
    <h2 class="Accueil-link">Voulez-vous vous inscrire?</h2>
</a>



<?php
foreach ($responsables as $responsable):
    ?>
    <?php if ($responsable['efface'] == '0') : ?>
        <p><a href="AdminResponsables/confirmer/<?= $this->nettoyer($responsable['id']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($responsable['nom']) ?>, <?= $this->nettoyer($responsable['mot_de_passe']) ?> <?= $this->nettoyer($responsable['numero_de_telephone']) ?>)<br/>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminResponsables/retablir/<?= $this->nettoyer($responsable['id']) ?>" >
                [Rétablir]</a>
        </p>
    <?php endif; ?>
<?php endforeach; ?>