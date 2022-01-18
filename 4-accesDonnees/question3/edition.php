<?php
    $id_pers = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $enregistrer = filter_input(INPUT_POST, 'Enregistrer', FILTER_SANITIZE_STRING);
    $nom = filter_input(INPUT_POST, 'NomDeFamil', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'Prnom', FILTER_SANITIZE_STRING);
    $adresse = filter_input(INPUT_POST, 'Adresse', FILTER_SANITIZE_STRING);
    $cp = filter_input(INPUT_POST, 'CodePostal', FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '#^\d{5}$#']]);
    $ville = filter_input(INPUT_POST, 'Ville', FILTER_SANITIZE_STRING);
    $ok = false;
    require_once '../tp1/tp1cnx.php';

    if ($enregistrer && $id_pers && $nom && $prenom && $adresse && $cp && $ville) {
        $prep = $pdo->prepare('UPDATE proprietaires SET nom=:nom, '
                    . 'prenom=:prenom, adresse=:adresse, codepostal=:cp, '
                    . 'ville=:ville WHERE id_pers=:id_pers;');
        $prep->bindValue(':id_pers', $id_pers);
        $prep->bindValue(':nom', $nom);
        $prep->bindValue(':prenom', $prenom);
        $prep->bindValue(':adresse', $adresse);
        $prep->bindValue(':ville', $ville);
        $prep->bindValue(':cp', $cp);
        $rep = $prep->execute();

        if ($rep) {
            header('location:traitementEffectue.php');
            die();
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../../2-poo/autoLoad/autoLoad.php';
        $prep = $pdo->prepare('SELECT * FROM proprietaires WHERE id_pers=:id_pers');
        $prep->bindValue(':id_pers', $id_pers);
        $prep->execute();
        $donnees = $prep->fetch(); 
        $f = new Form2('Modification de vos informations', '#');
        $f->setInput('hidden', 'Numéro d\'identification', true, ['value' => $id_pers]);
        $f->setText('Nom de famille', $donnees['nom']);
        $f->setText('Prénom', $donnees['prenom']);
        $f->setText('Adresse', $donnees['adresse']);
        $f->setText('Code Postal', $donnees['codepostal']);
        $f->setText('Ville', $donnees['ville']);
        $f->setSubmit('Enregistrer');
        echo $f->getForm();
        ?>
    </body>
</html>
