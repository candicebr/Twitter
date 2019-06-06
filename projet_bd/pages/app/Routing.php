<?php
namespace app;
use app\src\App;
use controller\UserController;
class Routing
{
    private $app;
    /**
     *Routing constructor
     *@param App $app
     */
    public function __construct(App $app) {
        $this->app = $app;
    }
    public function setup() {
        //cities
        /*$city = new CityController($this->app);
        $this->app->get('/', [$city, 'citiesHandler']);
        $this->app->get('/city/(\d+)', [$city, 'cityHandler']);
        $this->app->get('/recherche.php/(\w*)', [$city, 'searchHandler']);
        $this->app->get('/recherche.php', [$city, 'searchHandlerV']);
        $this->app->get('/create.php', [$city, 'createHandler']);
        $this->app->post('/handleCreate.php', [$city, 'createDBHandler']);
        // $this->app->post('/deleteCities.php', [$city, 'deleteDBHandlerCities']);
        */

        $this->app->get('/', function() {
        return $this->app->getService('render')('index1');
        });

        $user = new UserController($this->app);

        //Inscription
        $this->app->get('/inscription.php', [$user, 'createHandler']);
        $this->app->post('/traitement.php', [$user, 'createDBHandler']);


        //Connection
        $this->app->get('/index1.php', [$user, 'connectionHandler']);
        $this->app->post('/traitementConnection.php', [$user, 'connectionDBHandler']);

        //Accueil
        $this->app->get('/tl.php', function() {
            return $this->app->getService('render')('tl');
        });

        $this->app->get('/profilTweet.php', [$user, 'profilHandler']);



    }
}