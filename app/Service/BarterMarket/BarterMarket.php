<?php

namespace App\Service\BarterMarket;

class BarterMarket
{
    protected $comicBooks;

    protected $coins;

    protected $coinsNeeded;

    protected $coinsOffered;

    protected $defaultCoins;

    public function __construct($comicBooks, $coins, $coinsNeeded, $coinsOffered)
    {
        $this->comicBooks = (int) $comicBooks;
        $this->coins = (int) $coins;
        $this->coinsNeeded = (int) $coinsNeeded;
        $this->coinsOffered = (int) $coinsOffered;
        $this->defaultCoins = $coins;
    }

    public function run()
    {
        $fictionBook  = 0;
        while ($this->coins > 0 && $this->comicBooks > 0 && $fictionBook <= $this->defaultCoins) {
            if($this->coins < $this->coinsNeeded){
                if($this->comicBooks > 0){
                    $this->coins = $this->coins + $this->coinsOffered;
                    $this->comicBooks--;
                }
            }
            $this->comicBooks = $this->comicBooks - 1;
            $this->coins = $this->coins - $this->coinsNeeded;
            $fictionBook++;
        }
        return $fictionBook;
    }
}
