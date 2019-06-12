<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Twitter</title>
    <link rel="stylesheet"  href="./view/css/style.css">
</head>

<body>

<!-- Le corps -->
<div id="corps">

    <form method="post" action="traitementConnection.php">
        <p>
            <input type="text" name="user_name" id="user_name" placeholder="Nom d'utilisateur" size="30" maxlength="10" />
            <input type="password" name="password" id="password" placeholder="Mot de passe" size="30"/>
            <input type="submit" value="Se Connecter" />
        </p>
    </form>
    <?php if(isset($_SESSION['flash'])) {
        echo "
           <p style='color: red'>
            " . $_SESSION['flash'] . " 
           </p>
        ";
    }
     ?>

    <img src="./view/img/bird.png" HEIGHT="740">

    <h1>Découvrez ce qui se passe dans le monde en temps réel.</h1>

    <h2>Rejoignez Twitter aujourd'hui.</h2>

    <a href="inscription.php"><h3>S'inscrire</h3></a>

</div>

<!-- Le pied de page -->

<?php include("pied_de_page.php"); ?>

</body>
</html>