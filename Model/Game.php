<?php
include __DIR__ . '/Product.php';

class Game extends Product{
    private $title;
    private $playtime;
    private $img;

    function __construct($title, $img, $playtime, $prezzo, $sconto, $quantitá){
        parent:: __construct($prezzo, $sconto, $quantitá);
        
        $this->title = $title;
        $this->img = $img;
        $this->playtime = $playtime;
    }

    public static function getGames(){
        $gamesString = file_get_contents(__DIR__ . '/steam_db.json');
        $gamesList = json_decode($gamesString, true);

        $games = [];

        foreach($gamesList as $item){
            $game = new Game($item['name'], $item['img_icon_url'], $item['playtime_forever'], rand(1, 100), rand(40, 100), rand(1, 100));
            array_push($games, $game);
        }

        return $games;
    }

    public function printCard(){
        $image = $this->img;
        $title = $this->title;
        $content = $this->playtime;
        $custom = "";
        $genere = "";
        $prezzo = $this->prezzo;
        $quantitá = $this->quantitá;
        $sconto = $this->sconto . "%";

        include __DIR__."/../Views/card.php";
    }
}