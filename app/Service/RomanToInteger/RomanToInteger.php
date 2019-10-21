<?php

namespace App\Service\RomanToInteger;

use App\Service\BaseService;
use Illuminate\Support\Str;

class RomanToInteger implements BaseService
{
    protected $romanNumerals;

    protected $totalValue = 0;

    protected $lastValue = 0;

    const DEFAULT_ROMAN_NUMERALS = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];

    public function __construct($romanNumerals)
    {
        $this->romanNumerals = Str::upper($romanNumerals);
    }

    public function run()
    {
        $splitRomanNumerals = str_split($this->romanNumerals);
        for($i = (count($splitRomanNumerals) - 1); $i >= 0;  $i--){
            $integerValue = self::DEFAULT_ROMAN_NUMERALS[$splitRomanNumerals[$i]];
            if($integerValue < $this->lastValue){
                $this->totalValue -= $integerValue;
            }else{
                $this->totalValue += $integerValue;
                $this->lastValue = $integerValue;
            }
        }
        return $this->totalValue;
    }
}
