<?php

/*namespace database;

class Database{

    private $bdd;

    public function __construct(String $host, String $name, String $user, String $pass)//il manque le port
    {*/
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=bdd_twitter;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    //}
//}

$reponse = $bdd->query('SELECT * FROM (user)');
?>