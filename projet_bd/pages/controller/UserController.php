<?php


namespace controller;
use Controller\ControllerBase;
use app\src\App;
use model\gateway\UserGateway;
use app\src\Request\Request;
use model\finder\UserFinder;



class UserController extends ControllerBase
{
    public function __construct(App $app) {
        parent::__construct($app);
    }

    public function createHandler(Request $request) {
        return $this->app->getService('render')('inscription');
    }

    public function createDBHandler(Request $request) {

        $result = new UserGateway($this->app);
        $user = [

            $result->setUserName($request->getParameters('user_name')),
            $result->setPseudo($request->getParameters('pseudo')),
            $result->setPassword($request->getParameters('password')),
            $result->setBirth($request->getParameters('birth'))

        ];

        $result->insert();

        $_SESSION['user_name'] = $result->getUserName();
        $_SESSION['pseudo'] = $result->getPseudo();

        $_SESSION['birth'] = $result->getBirth();
        $_SESSION['info_perso'] = $result->getInfoPerso();
        //$jour = date('j');

        //S_SESSION['jour'] = $jour;



        if(!$result) {
            $this->app->getService('render')('inscription', ['user' => $user, 'error' => true]);
        }
        $flash= "New user has been sucessfully created";
        $_SESSION['flash'] =$flash;

        $this->redirect('/projet_bd/pages/tl.php');

    }

    public function connectionHandler(Request $request) {
        return $this->app->getService('render')('index1');
    }

    public function connectionDBHandler(Request $request) {

        $result = new UserGateway($this->app);

        $_SESSION['user_name'] = $result->getUserName();
        $_SESSION['pseudo'] = $result->getPseudo();

        $_SESSION['birth'] = $result->getBirth();
        $_SESSION['info_perso'] = $result->getInfoPerso();

        $user = [

            $result->setUserName($request->getParameters('user_name')),
            $result->setPassword($request->getParameters('password')),

        ];

        $user_name = $this->app->getService('userFinder')->findNameByName($user);
        $user_password = $this->app->getService('userFinder')->findPasswordByName($user);

        $flash= "Nom d'utilisateur inconnu";
        $flash2="Mode de passe éronné";

        if(isset($_SESSION['user_name']) && $_SESSION['user_name']==$user_name)
        {
            if(isset($_SESSION['password']) && password_hash($_SESSION['password'], PASSWORD_DEFAULT)==$user_password)
            {
                $this->redirect('/projet_bd/pages/tl.php');
            }
            else{
                $_SESSION['flash'] =$flash2;
            }
        }
        else{
            $_SESSION['flash'] =$flash;
        }

    }


    public function profilHandler(Request $request)
    {
        $user = $_SESSION;

        return $this->app->getService('render')('profilTweet', ['user' => $user]);
    }
   // public function User_Info(Request $request, )



}