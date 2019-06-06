<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Twitter</title>
    <link rel="stylesheet"  href="./view/css/styleInscription.css">
</head>

<body>

<!-- Le corps -->
<div id="corps">

    <h1>Créer votre compte</h1>
    <form method="post" action="traitement.php">
     <p>
    <input type="text" name="pseudo" id="pseudo" placeholder="pseudo" size="30" maxlength="50" />
     </p>
     <p>
    <input type="text" name="user_name" id="user_name" placeholder="@nom d'utilisateur" size="30"/>
     </p>
        <p>
            <input type="password" name="password" id="password" placeholder="password" size="30" maxlength="50" />
        </p>
     <p>
         <label for="birth">Votre date de naissance<br/></label>
        <input type="date" name="birth" id="birth" placeholder="birth"/>
     </p>
        <input type="submit" value="s'inscrire" />
    </form>


</div>

<!-- Le pied de page -->

<?php include("pied_de_page.php"); ?>

</body>
</html>
