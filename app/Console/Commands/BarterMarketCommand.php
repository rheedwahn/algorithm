<?php

namespace App\Console\Commands;

use App\Service\BarterMarket\BarterMarket;
use Illuminate\Console\Command;

class BarterMarketCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'barter-market:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This console application solves the barter market algorithm problem on van hack';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Question
     */
    /*At a barter market, Goods can be exchanged with one another or can be exchanged for currency. Alex is attending
    one such barter market and has n comic books
    and total of m coins. Alex wants to own as many fiction booos as possible. The following will help achieve the same

    Trade any comic book by paying x coins to get fiction book, i.e 1 comic book + x coins = 1 fiction book
    Any comic book can be sold for a price of y coins
    Alex cannot sell any fiction books.

    Help find the maximum number of fiction books alex can have in the end, and output the same.
    Example
    comicBooks = 10
    coins = 10
    coinsNeeded = 1
    coinsOffered = 1


    it takes 1 comic book plus coinsNeeded = 1 coin to purchase a fiction book.Alex can trade 10 comic books + 10 coins
    to get 10 fiction books.
    No comic books need to be sold

        Function description
    complete the barterMarket function.the function must return an integer denoting the maximum number of fiction books
     Alex can have in the end.

    barter market has 4 parameters:
    comicBooks: An integer denoting the number of comic books.
    coins: An integer denoting the origin number of coins
    coinsNeeded: An integer denoting the  number of coins Alex needs to pay along with comic book to get a fiction book
    coinsOffered: An integer denoting the number of coins Alex gets on selling one comic book

    Sub-topic
    Input format for custom testing

    the first line contains an integer,comicBooks,denoting the number of comic books.
    the next line contains an integer, coins, denoting the original number of coins.
    the next line contains an integer, coinsNeeded, denoting the number of coinsNeeded,denoting the number of coins
    Alex needs along with comic book to get a fiction book.
    the next line contains an integer, coinsOffered,denoting the number of coins Alex get on selling one comic book.

    Sample Case 0
    sample input 0 => 4,8,4,3
    sample output 0 => 2

    Explanation 0
    comicBooks = 4
    coins = 8
    coinsNeeded = 4
    coinsOffered = 3

    Alex has 4 comic books and 8 coins. hence, at most 2 comic books can be traded to get 2 fiction books.
    if alex sell 1 comic book, the coins balance goes up by coinsOffered = 3 and coins = 11. That is not enough
    to trade a third comic books plus coins for another fiction book.*/

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $comicBooks = $this->ask('Please enter the comic book number in integer...');
        $coins = $this->ask('Please enter the coins...');
        $coinsNeeded = $this->ask('Enter the coins needed...');
        $coinsOffered = $this->ask('Enter the coins offered...');

        $barterMarket = new BarterMarket($comicBooks, $coins, $coinsNeeded, $coinsOffered);
        $fictionBook = $barterMarket->run();

        $this->info('You can only have '.$fictionBook.' fiction book(s)');
    }
}
