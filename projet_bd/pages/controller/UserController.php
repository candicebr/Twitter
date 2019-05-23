<?php


namespace controller;
use Controller\ControllerBase;
use app\src\App;
use model\gateway\UserGateway;
use app\src\Request\Request;



class UserController extends ControllerBase
{
    public function __construct(App $app) {
        parent::__construct($app);
        session_start();
    }

    public function createHandler(Request $request) {
        return $this->app->getService('render')('inscription');
    }

    public function createDBHandler(Request $request) {

        $result = new UserGateway($this->app);
        $user = [

            $result->setUserName($request->getParameters('user_name')),
            $result->setPseudo($request->getParameters('pseudo')),
            $result->setPassword($request->getParameters('password'))
        ];


        $result->insert();

        if(!$result) {
            $this->app->getService('render')('inscription', ['user' => $user, 'error' => true]);
        }
        $flash= "New user has been sucessfully created";
        $_SESSION['flash'] =$flash;

        $this->redirect('/projet_bd/pages/tl.php');

    }

    public function userHandler(Request $request, $id) {
        if(!$id) {
            return $this->app->getService('render')('404');
        }

        $user = $this->app->getService('userFinder')->findOneById($id);

        return $this->app->getService('render')('user', ['user' => $user]);
    }
}