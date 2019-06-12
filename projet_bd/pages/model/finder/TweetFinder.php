<?php


namespace model\finder;

use app\src\App;
use Model\gateway\TweetGateway;


class TweetFinder
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

    public function findTweetByUser($id)
    {
        $query = $this->conn->prepare('SELECT t.tweet_id, t.tweet_content, t.tweet_date, t.tweet_user_id FROM tweet t WHERE t.tweet_user_id = :tweet_user_id ORDER BY t.tweet_date');
        $query->execute([':tweet_user_id' => $id]); // Exécution de la requête
        $elements = $query->fetchAll(\PDO::FETCH_ASSOC);

        if($elements == 0) return null;

        $tweets = [];
        $tweet = null;

        foreach ($elements as $element)
        {
            $tweet = new TweetGateway($this->app);
            $tweet->hydrate($element);

            $tweets[] = $tweet;
        }

        return $tweets;

    }

    public function findTweetById($id)
    {
        $query = $this->conn->prepare('SELECT t.tweet_id, t.tweet_content, t.tweet_date, t.tweet_user_id FROM tweet t WHERE t.tweet_id = :tweet_id ORDER BY t.tweet_date');
        $query->execute([':tweet_id' => $id]); // Exécution de la requête
        $elements = $query->fetchAll(\PDO::FETCH_ASSOC);

        if($elements == 0) return null;

        $tweets = [];
        $tweet = null;

        foreach ($elements as $element)
        {
            $tweet = new TweetGateway($this->app);
            $tweet->hydrate($element);

            $tweets[] = $tweet;
        }

        return $tweets;
    }
}