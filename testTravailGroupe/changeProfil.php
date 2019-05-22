<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Twitter</title>
    <link rel="stylesheet"  href="css/styleChangeProfil.css">
</head>

<body>

<!--menu-->

<?php include("menu.php"); ?>

<!-- Petit menu: tweets, abonnements, abonnés, j'aime-->

<section>
    <a href="profilTweet.php"><h4>Tweets</h4></a><a href="profilAbonnement.php"><h4>Abonnements</h4></a><a href="profilAbonnés.php"><h4>Abonnés</h4></a><a href="profilLike.php"><h4>J'aime</h4></a><a href="changeProfil.php"><h14>Editer le profil</h14></a>
</section>

<!--section où nous pourrons modifier les données de notre profil-->
<?php include("editProfil.php");?>

<!-- Le pied de page -->

<?php include("pied_de_page.php"); ?>

</body>
</html>
