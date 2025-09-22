<?php $this->titre = "Le Blogue du prof - Connexion" ?>

<?php if ($responsable): ?>
    <p>Bienvenue, <?= htmlspecialchars($responsable['login']) ?> !</p>
    <a href="Responsables/deconnecter">[Se déconnecter]</a>
<?php else: ?>
    <p>Vous devez être en session pour accéder à cette zone.</p>

    <form action="Responsables/connecter" method="post">
        <input name="login" type="text" placeholder="Entrez votre login" required autofocus>
        <input name="mdp" type="password" placeholder="Entrez votre mot de passe" required>
        <button type="submit">Connexion</button>
    </form>

    <?= ($erreur == 'mdp') ? '<span style="color : red;">Login ou mot de passe incorrects</span>' : '' ?>
<?php endif; ?>
