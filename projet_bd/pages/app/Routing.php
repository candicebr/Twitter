<?php
namespace app;
use app\src\App;
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
    }
}