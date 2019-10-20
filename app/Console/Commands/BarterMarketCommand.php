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
