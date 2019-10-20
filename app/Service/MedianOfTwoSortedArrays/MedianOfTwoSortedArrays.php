<?php

namespace App\Service\MedianOfTwoSortedArrays;

use App\Service\BaseService;

class MedianOfTwoSortedArrays implements BaseService
{
    protected $firstArray;

    protected $secondArray;

    protected $mergeList;

    public function __construct($firstArray, $secondArray)
    {
        $this->firstArray = $firstArray;
        $this->secondArray = $secondArray;
        $this->mergeList = array_merge($this->firstArray, $this->secondArray);
        sort($this->mergeList);
    }

    public function run()
    {
        $length = count($this->mergeList);
        //check if array count is odd
        if($length % 2 == 0){
            return ($this->mergeList[($length/2)-1] + $this->mergeList[($length/2)]) / 2;
        }
        return $this->mergeList[$length/2];
    }
}
