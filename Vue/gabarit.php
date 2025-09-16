<!-- Affichage -->
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/css/style.css" />
    <link rel="stylesheet"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css"
        type="text/css" />
    <title><?= $titre ?></title> <!-- Élément spécifique -->
</head>

<body>
    <div id="global">
        <header>


            <a href="index.php">
                <h1 id="titreBlog"><span data-i18n="BlogueProf">Le Blogue du prof</span> v0.8.0.1</h1>
            </a>
            <p>Version MVC en PHP orienté-objet avec tests.</p>
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
