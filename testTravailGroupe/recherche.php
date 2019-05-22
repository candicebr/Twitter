<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Twitter</title>
    <link rel="stylesheet"  href="css/styleRecherche.css">
</head>

<body>

<!--menu-->

<?php include("menu.php"); ?>

<h4><?php echo htmlspecialchars($_POST['recherche']);?></h4>

<!-- liste des personnes correspondantes aux caractères de la recherche-->

<?php include("find.php");?>


<!-- Le pied de page -->

<?php include("pied_de_page.php"); ?>

</body>
</html>
