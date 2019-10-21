<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Service\RomanToInteger\RomanToInteger as RomanToIntegerService;

class RomanToInteger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roman-to-integer:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command gives the respective integer of a roman numeral';

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
    /*Roman numerals are represented by seven different symbols: I, V, X, L, C, D and M.

    Symbol       Value
    I             1
    V             5
    X             10
    L             50
    C             100
    D             500
    M             1000
    For example, two is written as II in Roman numeral, just two one's added together. Twelve is written as, XII,
    which is simply X + II. The number twenty seven is written as XXVII, which is XX + V + II.

    Roman numerals are usually written largest to smallest from left to right. However, the numeral for four is not IIII.
    Instead, the number four is written as IV. Because the one is before the five we subtract it making four.
    The same principle applies to the number nine, which is written as IX. There are six instances where subtraction is used:

    I can be placed before V (5) and X (10) to make 4 and 9.
    X can be placed before L (50) and C (100) to make 40 and 90.
    C can be placed before D (500) and M (1000) to make 400 and 900.
    Given a roman numeral, convert it to an integer. Input is guaranteed to be within the range from 1 to 3999.*/

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $romanNumeral = $this->ask('Enter the roman numeral you want to convert...');

        $integerValue = (new RomanToIntegerService($romanNumeral))->run();

        $this->info('The integer value for '.$romanNumeral.' is '.$integerValue);
    }
}
