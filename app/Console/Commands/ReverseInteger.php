<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Service\ReverseInteger\ReverseInteger as ReverseIntegerService;

class ReverseInteger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reverse-integer:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command reverse integers';

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
    /*Given a 32-bit signed integer, reverse digits of an integer.

    Example 1:

    Input: 123
    Output: 321
    Example 2:

    Input: -123
    Output: -321
    Example 3:

    Input: 120
    Output: 21
    Note:
    Assume we are dealing with an environment which could only store integers within the 32-bit signed integer range: [−231,
    231 − 1]. For the purpose of this problem, assume that your function returns 0 when the reversed integer overflows.*/

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $integer = $this->ask('Please enter the integer to be reversed...');
        $reversedInteger = (new ReverseIntegerService($integer))->run();

        $this->info('The reverse equivalent of '.$integer.' is '.$reversedInteger);
    }
}
