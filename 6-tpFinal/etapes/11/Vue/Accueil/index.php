<?php
namespace Vue\Accueil;
$this->titre = 'Vos restaurants préférés';
?>

<h1>Vos restaurants préférés</h1>
<?php foreach ($restaurants as $restaurant): ?>
    <h2><a href="index.php?controleur=Restaurant&idRestaurant=<?=$restaurant['idRestaurant']?>"><?=$restaurant['nom']?></a></h2>
    <address><?=$restaurant['ville']?></address>
    <?=$restaurant['description']?>
    <hr>
<?php endforeach;
