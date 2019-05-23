<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Twitter</title>
    <link rel="stylesheet"  href="./view/css/styleTL.css">
</head>

<body>

<!--menu-->

<?php include("menu.php"); ?>

<!-- Rapide apperçu du profil -->
<section>
    <h4><?= $params['user']->getPseudo(); ?></h4>
    <h5>@Nom d'utilisateur</h5>
    <h6>Tweets</h6><h6>Abonnements</h6><h6>Abonnés</h6>
    <h7>Nombre</h7><h7>Nombre</h7><h7>Nombre</h7>
</section>

<!-- tlTweet-->

<?php include("tlTweet.php"); ?>

<!-- Le pied de page -->

<?php include("pied_de_page.php"); ?>

</body>
</html>
