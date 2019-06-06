<?php


namespace model\finder;

use app\src\App;
use Model\gateway\CityGateway;
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

    public function findNameByName($user)
    {
        $query = $this->conn->prepare('SELECT u.user_name FROM user u WHERE u.user_name = :user_name');
        $query->execute([':user_name' => $user]); // Exécution de la requête
        $elements = $query->fetch(\PDO::FETCH_ASSOC);

        if($elements == 0) return null;

        return $user;
    }

    public function findPasswordByName($user)
    {
        $query = $this->conn->prepare('SELECT u.password FROM user u WHERE u.user_name = :user_name AND u.password=:password');
        $query->execute([':user_password' => $user], [':user_name' => $user] ); // Exécution de la requête
        $elements = $query->fetch(\PDO::FETCH_ASSOC);

        if($elements == 0) return null;

        return $user;
    }



}