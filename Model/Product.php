<?php

class Product{
    public float $prezzo;
    public int $sconto;
    public int $quantitá;

    function __construct($prezzo, $sconto, $quantitá){
        $this->prezzo = $prezzo;
        $this->sconto = $sconto;
        $this->quantitá = $quantitá;
    }
}



?>