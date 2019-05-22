<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Twitter</title>
    <link rel="stylesheet"  href="css/style.css">
</head>

<body>

<!-- Le corps -->
<div id="corps">

    <form method="post" action=".php">
        <p>
            <input type="text" name="pseudo" id="name" placeholder="Nom d'utilisateur" size="30" maxlength="10" />
            <input type="password" name="pass" id="pass" placeholder="Mot de passe" size="30"/>
            <input type="submit" value="Se Connecter" />
        </p>
    </form>

    <img src="img/bird.png" HEIGHT="740">

    <h1>Découvrez ce qui se passe dans le monde en temps réel.</h1>

    <h2>Rejoignez Twitter aujourd'hui.</h2>

    <a href="inscription.php"><h3>S'inscrire</h3></a>

</div>

<!-- Le pied de page -->

<?php include("pied_de_page.php"); ?>

</body>
</html>