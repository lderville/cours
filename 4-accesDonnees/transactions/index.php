<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>PDO : Les transactions</title>
        <link href="../../style/style.css" rel="stylesheet">
    </head>
    <body>
        <h1>PDO : Les transactions</h1>
        <?php
        $fichiers = ['trans.php'];
        $execution = 'trans.php';
        require '../../afficheCode2.php';
        ?>
        <h4 class="commentaires">Commentaires</h4>
        <div>
            Le moteur de stockage MyISAM ne supporte pas les transactions.
            Il faut donc utiliser le moteur InnoDB pour que cela fonctionne.
            Pour utiliser le moteur sur la table articles par exemple, il faut utiliser l'instruction suivante :
            <code>ALTER TABLE articles ENGINE=InnoDB;</code>
        </div>

    </body>
</html>
