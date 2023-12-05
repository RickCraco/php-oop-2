<?php

include __DIR__ . '/Product.php';

class Book extends Product{
    private $titolo;
    private $imgUrl;
    private $descrizione;

    function __construct($titolo, $imgUrl, $descrizione, $prezzo, $sconto, $quantitá){

        parent:: __construct($prezzo, $sconto, $quantitá);

        $this->titolo = $titolo;
        $this->imgUrl = $imgUrl;
        $this->descrizione = $descrizione;
    }

    public static function getBooks(){
        $booksString = file_get_contents(__DIR__ . '/books_db.json');
        $booksList = json_decode($booksString, true);

        $books = [];

        foreach($booksList as $item){
            $book = new Book($item['title'], $item['thumbnailUrl'], $item['longDescription'], rand(1, 100), rand(40, 100), rand(1, 100));
            array_push($books, $book);
        }
    }
}