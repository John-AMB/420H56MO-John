<!-- Affichage -->
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <base href="<?=$racineWeb?>" >
    <link rel="stylesheet" href="<?=$racineWeb?>Contenu/css/style.css" />
    
    <title><?= $titre ?></title> <!-- Élément spécifique -->
</head>

<body>
    <div id="global">
        <header>
            <a href="">
                <h1 id="titreBlog"><span data-i18n="BlogueProf">Vétérinaire pour chiens</span> v0.8.0.1</h1>
            </a>
            <p>Version MVC en PHP orienté-objet avec tests.</p>
            </a>
            <a href="Apropos">
                    <h3>À propos | </h4>
                </a>
            <a href="tests.php">
                <h3>TESTS</h3>
            </a>
        </header>
        <div id="contenu">
            <?= $contenu ?>
            <!-- Élément spécifique -->
        </div> <!-- #contenu -->
        <footer id="piedBlog">
            Blog réalisé avec PHP, HTML5 et CSS.
        </footer>
    </div> <!-- #global -->

</body>

</html>
