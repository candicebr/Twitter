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

    public function findOneById($id)
    {
        $query = $this->conn->prepare('SELECT u.id, u.user_name, u.pseudo FROM user u WHERE u.id = :id'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        $query->execute([':id' => $id]); // Exécution de la requête
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if ($element == null) return null;

        $user = new UserGateway($this->app);
        $user->hydrate($element);

        return $user;
    }
}