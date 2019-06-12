<?php
namespace app;
use app\src\App;
use controller\FollowController;
use controller\LikesController;
use controller\RetweetController;
use controller\UserController;
use controller\TweetController;
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
        $tweet = new TweetController($this->app);
        $follow = new FollowController($this->app);
        $like = new LikesController($this->app);
        $retweet = new RetweetController($this->app);

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

        //Profil
        $this->app->get('/profilTweet.php', [$user, 'profilHandler']);
        //$this->app->get('/profilTweet.php', [$tweet, 'TweetHandler']);

        //Recherche
        $this->app->get('/recherche.php', [$user, 'rechercheHandler']);
        $this->app->post('/traitementRecherche.php', [$user, 'rechercheDBHandler']);

        //Tweeter
        $this->app->get('/tweeter.php', [$tweet, 'createTweetHandler']);
        $this->app->post('/traitementTweet.php', [$tweet, 'createTweetDBHandler']);

        //EditerProfil
        $this->app->get('/changeProfil.php', [$user, 'changeProfilHandler']);
        $this->app->post('/traitementChangeProfil.php', [$user, 'changeProfilDBHandler']);

        //Suivre
        $this->app->get('/traitementSuivre.php/(\d+)', [$follow, 'abonnementDBHandler']);

        //Like
        $this->app->get('/traitementLike.php/(\d+)', [$like, 'likeDBHandler']);


        //Retweet
        $this->app->get('/traitementRetweet.php/(\d+)', [$retweet, 'retweetDBHandler']);

        //SupprimerTweet
        $this->app->get('/traitementSuppTweet.php/(\d+)', [$tweet, 'deleteTweetDBHandler']);
    }
}