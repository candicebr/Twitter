<?php


namespace model\finder;

use app\src\App;
use Model\gateway\UserGateway;

class UserFinder
{

    /**
     * @var \PDO
     */
    private $conn;

    /**
     * @var App
     */
    private $app;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->conn = $this->app->getService('database')->getConnection();
    }

    public function findNameByName($name)
    {
        $query = $this->conn->prepare('SELECT u.user_name FROM user u WHERE u.user_name = :user_name');
        $query->execute([':user_name' => $name]); // Exécution de la requête
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if($element == 0) return null;

       /* $user_name = new UserGateway($this->app);
        $user_name->hydrate($element);*/

        return $element;
    }

    public function findPasswordByName($name)
    {
        $query = $this->conn->prepare('SELECT u.password FROM user u WHERE u.user_name = :user_name');
        $query->execute([':user_name' => $name] ); // Exécution de la requête
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if($element == 0) return null;

        return $element;
    }

    public function findUserByLogin($name)
    {
        $query = $this->conn->prepare('SELECT u.id, u.user_name, u.pseudo, u.birth, u.info_perso FROM user u WHERE u.user_name = :user_name');
        $query->execute([':user_name' => $name] ); // Exécution de la requête
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if($element == 0) return null;

        return $element;
    }

    public function findUserById($id)
    {
        $query = $this->conn->prepare('SELECT u.id, u.user_name, u.pseudo, u.birth, u.info_perso FROM user u WHERE u.id = :id');
        $query->execute([':id' => $id] ); // Exécution de la requête
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if($element == 0) return null;

        return $element;
    }

    public function FindUserByName($searchString)
    {
        $query = $this->conn->prepare('SELECT u.id, u.user_name, u.pseudo, u.info_perso, u.birth FROM user u WHERE u.user_name like :search ORDER BY u.user_name'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        $query->execute([':search' => '%' . $searchString .  '%']); // Exécution de la requête
        $elements = $query->fetchAll(\PDO::FETCH_ASSOC);

        if($elements == 0) return null;

        $users = [];
        $user = null;

        foreach ($elements as $element)
        {
            $user = new UserGateway($this->app);
            $user->hydrate($element);

            $users[] = $user;
        }

        return $users;
    }



}