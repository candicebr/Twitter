<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Twitter</title>
    <link rel="stylesheet"  href="./view/css/styleTweeter.css">
</head>

<body>

<!--menu-->

<?php include("menu.php"); ?>

<article>
    <h4>Ecrire un nouveau Tweet</h4>
    <form method="post" action="traitementTweet.php">
        <textarea name="tweet_content" id="tweet_content" placeholder="Quoi de neuf ?" rows="5" cols="28" maxlength="140"></textarea>
        <input type="submit" value="Tweeter" />
    </form>
</article>

<!-- Le pied de page -->

<?php include("pied_de_page.php"); ?>

</body>
</html>
