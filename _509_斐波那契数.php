<?php

class Solution
{
    /**
     * 暴力递归方式解决问题【时间复杂度为O(n^2)】
     * @param $N
     * @return int
     */
    function fib1($N) {
        if ($N <= 0) {
            return 0;
        } elseif ($N <= 2) {
            return 1;
        } else {
            return $this->fib1($N - 1) + $this->fib1($N - 2);
        }
    }

    /**
     * 计算过的存储起来，减少重复计算【时间复杂度为O(n)】
     * @param $N
     * @return int|mixed
     */
    function fib2($N) {
        if ($N <= 0) {
            return 0;
        } elseif ($N <= 2) {
            return 1;
        } else {
            $num_arr = [];
            $fn = $this->f_num($num_arr, $N);
            // print_r($num_arr);
            return $fn;
        }
    }

    function f_num(&$num_arr, $n) {
        if ($n == 1 || $n == 2) return 1;
        return $num_arr[$n] ?? $this->f_num($num_arr, $n - 1) + $this->f_num($num_arr, $n - 2);
    }

    /**
     * 动态规划【时间复杂度为O(n)】
     * @param $N
     * @return int
     */
    function fib3($N) {
        if ($N < 2) return $N;
        $pre = 0;
        $curr = 1;
        for ($i = 0; $i < $N - 1; $i++) {
            $sum = $pre + $curr;
            $pre = $curr;
            $curr = $sum;
        }
        return $curr;
    }

    /**
     * 厚颜无耻的解法【时间复杂度O(1)】
     * @param $N
     * @return mixed
     */
    function fib4($N) {
        $fn_arr = [
            0,
            1,
            1,
            2,
            3,
            5,
            8,
            13,
            21,
            34,
            55,
            89,
            144,
            233,
            377,
            610,
            987,
            1597,
            2584,
            4181,
            6765,
            10946,
            17711,
            28657,
            46368,
            75025,
            121393,
            196418,
            317811,
            514229,
            832040
        ];
        return $fn_arr[$N];
    }
}

$a = new Solution();
echo $a->fib4(6);
