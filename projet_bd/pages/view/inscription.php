<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Twitter</title>
    <link rel="stylesheet"  href="css/styleInscription.css">
</head>

<body>

<!-- Le corps -->
<div id="corps">

    <h1>Créer votre compte</h1>
    <form method="post" action="traitement.php">
     <p>
    <input type="text" name="speudo" id="speudo" placeholder="speudo" size="30" maxlength="50" />
     </p>
     <p>
    <input type="text" name="nomUtilisateur" id="nomUtilisateur" placeholder="@nom d'utilisateur" size="30"/>
     </p>
     <p>
         <label for="date de naissance">Votre date de naissance<br/></label>
        <input type="date" name="date de naissance" id="date de naissance" placeholder="Date de naissance"/>
     </p>
        <input type="submit" value="s'inscrire" />
    </form>


</div>

<!-- Le pied de page -->

<?php include("pied_de_page.php"); ?>

</body>
</html>
