<?php

namespace App\Console\Commands;

use App\Service\MedianOfTwoSortedArrays\MedianOfTwoSortedArrays;
use Illuminate\Console\Command;

class MediaOfTwoSortedArrays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media-of-two-sorted-arrays:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command solve the median of two sorted arrays algorithm test';

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
    /*There are two sorted arrays nums1 and nums2 of size m and n respectively.

    Find the median of the two sorted arrays. The overall run time complexity should be O(log (m+n)).

    You may assume nums1 and nums2 cannot be both empty.

    Example 1:

    nums1 = [1, 3]
    nums2 = [2]

    The median is 2.0
    Example 2:

    nums1 = [1, 2]
    nums2 = [3, 4]

    The median is (2 + 3)/2 = 2.5*/

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $firstNumbers = $this->ask('Please enter the first set of numbers separated with ","');
        $secondNumbers = $this->ask('Please enter the second set of numbers separated with ","');

        $firstArray = explode(',', $firstNumbers);
        $secondArray = explode(',', $secondNumbers);

        $median = (new MedianOfTwoSortedArrays($firstArray, $secondArray))->run();

        $this->info('The media is '.floatval($median));
    }
}
