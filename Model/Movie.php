<?php

include __DIR__ . '/Genre.php';
include __DIR__ . '/Product.php';

class Movie extends Product{
    public $id;
    public $title;
    public $original_title;
    public $overview;
    public $vote;
    public $poster_path;
    public $original_language;
    public Genre $genre;

    function __construct($id, $title, $original_title, $overview, $vote, $poster_path, $original_language,Genre $genre,$prezzo,$sconto,$quantitá){

        parent::__construct($prezzo,$sconto,$quantitá);

        $this->id = $id;
        $this->title = $title;
        $this->original_title = $original_title;
        $this->overview = $overview;
        $this->vote = $vote;
        $this->poster_path = $poster_path;
        $this->original_language = $original_language;
        $this->genre = $genre; // Corretto da $genres a $genre
    }
    

    public function printCard(){
        $image = $this->poster_path;
        $title = $this->title;
        $content = strlen($this->overview) > 28 ? substr($this->overview, 0, 28) . '...' : $this->overview;
        $custom = $this->getVote();
        $genere = $this->genre->name;
        $prezzo = $this->prezzo;
        $quantitá = $this->quantitá;
        $sconto = 0;

        if($this->title == "Spider-Man: Across the Spider-Verse"){
            $sconto = $this->getDiscount() . "%";
        }

        include __DIR__."/../Views/card.php";
    }

    public function getVote(){
        $vote = ceil($this->vote / 2);
        $template = "<p class= 'm-0'>";
        for($n=1; $n<=5; $n++){
            $template .= $n <= $vote ? '<i class="fa-solid fa-star text-warning"></i>' : '<i class="fa-regular fa-star text-warning"></i>';
        }
        $template .= "</p>";
        return $template;
    }
}

$movieString = file_get_contents(__DIR__.'/movie_db.json');
$movieList = json_decode($movieString, true);
$genreString = file_get_contents(__DIR__.'/genre_db.json');
$genreList = json_decode($genreString, true);

$movies = [];
$genres = [];

foreach($genreList as $item){
    $genre = new Genre($item);
    array_push($genres, $genre);
}

foreach($movieList as $item){
    $randomGenre = $genres[rand(0, count($genres)-1)];
    $movie = new Movie($item['id'], $item['title'], $item['original_title'], $item['overview'], $item['vote_average'], $item['poster_path'], $item['original_language'], $randomGenre,rand(0,100),rand(0,50),rand(0,100));
    array_push($movies, $movie);
}

?>