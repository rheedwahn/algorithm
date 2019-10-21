<?php

namespace App\Service\IntegerToRoman;

use App\Service\BaseService;

class IntegerToRoman implements BaseService
{
    protected $integer;

    protected $result = "";

    const STANDARD_ROMAN_ARRAY = ["M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"];

    const STANDARD_NUMBER_ARRAY = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];

    public function __construct($integer)
    {
        $this->integer = $integer;
    }

    public function run()
    {
        if($this->integer <= 0 || $this->integer > 3999){
            return 'error';
        }
        for ($i = 0; $i < count(self::STANDARD_NUMBER_ARRAY); $i++){
            while($this->integer >= self::STANDARD_NUMBER_ARRAY[$i]){
                $this->integer -= self::STANDARD_NUMBER_ARRAY[$i];
                $this->result .= self::STANDARD_ROMAN_ARRAY[$i];
            }
        }
        return $this->result;
    }
}
