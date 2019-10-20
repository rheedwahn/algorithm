<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Service\PalindromeNumbers\PalindromeNumbers as PalindromeNumberService;

class PalindromeNumbers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'palindrome-numbers:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command class check if a number is a palindrome number or not';

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
    /*Determine whether an integer is a palindrome. An integer is a palindrome when it reads the same backward as forward.

    Example 1:

    Input: 121
    Output: true
    Example 2:

    Input: -121
    Output: false
    Explanation: From left to right, it reads -121. From right to left, it becomes 121-. Therefore it is not a palindrome.
    Example 3:

    Input: 10
    Output: false
    Explanation: Reads 01 from right to left. Therefore it is not a palindrome.*/

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $palindromeCheck = ' not';

        $number = $this->ask('Enter the number you want to check...');

        $isPalindrome = (new PalindromeNumberService($number))->run();

        if($isPalindrome){
            $palindromeCheck = '';
        }

        $this->info(' '.$number.' is'.$palindromeCheck.' a palindrome number');
    }
}
