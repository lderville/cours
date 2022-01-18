<?php
$connexion = filter_input(INPUT_POST, 'Connexion', FILTER_SANITIZE_STRING);
if($connexion) {
    $nom = filter_input(INPUT_POST, 'NomDeFamil', FILTER_SANITIZE_STRING);
    $id_pers = filter_input(INPUT_POST, 'NumroDiden', FILTER_VALIDATE_INT);
    if($nom && $id_pers) {
        require_once '../tp1/tp1cnx.php';

        $prep = $pdo->prepare('SELECT * FROM proprietaires WHERE id_pers=:id_pers AND nom=:nom;');
        $prep->bindValue(':id_pers', $id_pers);
        $prep->bindValue(':nom', $nom);
        $prep->execute();
        $donnees = $prep->fetch();
        if($donnees) {
            // connexion réussie
            header("refresh:0;url=edition.php?id=".$id_pers); 
            die();
        } else {
            $message = 'echec de l\'authentification';
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <?php
        if(isset($message)) {
            echo '<div>' . $message . '</div>';
        }
            
        require_once '../../2-poo/autoLoad/autoLoad.php';

        $f = new Form2('Accédez à vos informations', '#');
        $f->setInput('number', 'Numéro d\'identification');
        $f->setText('Nom de famille');
        $f->setSubmit('Connexion');
        echo $f->getForm();
        ?>
    </body>
</html>
