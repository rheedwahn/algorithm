<?php

namespace App\Service\PalindromeNumbers;

use App\Service\BaseService;

class PalindromeNumbers implements BaseService
{
    protected $number;

    protected $defaultNumber;

    protected $revertedNumber = 0;

    public function __construct($number)
    {
        $this->number = $number;
        $this->defaultNumber = $number;
    }

    public function run()
    {
        if($this->number < 0 || ($this->number %10 == 0 && $this->number != 0)){
            return false;
        }

        while($this->defaultNumber >= 1){
            $this->revertedNumber = $this->revertedNumber * 10 + $this->defaultNumber % 10;
            $this->defaultNumber /= 10;
        }
        return $this->number == $this->revertedNumber;
    }
}
