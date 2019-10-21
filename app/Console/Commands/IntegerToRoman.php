<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Service\IntegerToRoman\IntegerToRoman as IntegerToRomanService;

class IntegerToRoman extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integer-to-roman:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command converts numbers to roman numerals';

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
        $integer = $this->ask('Please enter the number to be converted to roman numerals...');

        $romanNumeral = (new IntegerToRomanService($integer))->run();

        if($romanNumeral === 'error') {
            $this->info('Cannot get roman numeral for '.$integer);
        }else{
            $this->info('The roman numeral for '.$integer.' is '.$romanNumeral);
        }
    }
}
