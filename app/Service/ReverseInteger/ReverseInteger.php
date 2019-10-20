<?php

namespace App\Service\ReverseInteger;

use App\Service\BaseService;

class ReverseInteger implements BaseService
{
    protected $integer;

    public function __construct($integer)
    {
        $this->integer = $integer;
    }

    public function run()
    {
        if($this->integer < 0){
            $this->integer *= -1;
            return (-1 * $this->revereseInteger());
        }
        return $this->revereseInteger();
    }

    private function revereseInteger()
    {
        $integerToString = (string)$this->integer;
        $reverseString = strrev($integerToString);
        $stringToInteger = (int)$reverseString;
        if($stringToInteger < -(pow(2, 31)) || $stringToInteger > (pow(2, 31) - 1) ){
            return 0;
        }
        return $stringToInteger;
    }
}
