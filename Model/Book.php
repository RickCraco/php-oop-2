<?php

include __DIR__ . '/Product.php';

class Book extends Product{
    private $titolo;
    private $imgUrl;
    private $descrizione;
    private $autori;

    function __construct($titolo, $imgUrl, $descrizione, $prezzo, $sconto, $quantitá, $autori){

        parent:: __construct($prezzo, $sconto, $quantitá);

        $this->titolo = $titolo;
        $this->imgUrl = $imgUrl;
        $this->descrizione = $descrizione;
        $this->autori = $autori;
    }

    public static function getBooks(){
        $booksString = file_get_contents(__DIR__ . '/books_db.json');
        $booksList = json_decode($booksString, true);

        $books = [];

        foreach($booksList as $item){
            $book = new Book($item['title'], $item['thumbnailUrl'], $item['longDescription'], rand(1, 100), rand(40, 100), rand(1, 100), $item['authors']);
            array_push($books, $book);
        }

        return $books;
    }

    public function printAutori(){
        $autoriString = '';
        for($i = 0; $i < count($this->autori); $i++){
            $autoriString .= $this->autori[$i] . ', ';
        }
        return $autoriString;
    }

    public function printCard(){
        $image = $this->imgUrl;
        $title = $this->titolo;
        $content = strlen($this->descrizione) > 28 ? substr($this->descrizione, 0, 28) . '...' : $this->descrizione;
        $custom = $this->printAutori();
        $genere = "";
        $prezzo = $this->prezzo;
        $quantitá = $this->quantitá;
        $sconto = $this->sconto . "%";

        include __DIR__."/../Views/card.php";
    }
}