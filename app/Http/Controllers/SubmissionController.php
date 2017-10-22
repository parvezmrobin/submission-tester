<?php

namespace App\Http\Controllers;

use App\Models\Submission;


class SubmissionController extends Controller
{
    public function compareSubmissions(Submission $submission1, Submission $submission2)
    {
        $str1 = $submission1->submission["body"];
//        $str1 = htmlentities($str1);
        $str2 = $submission2->submission["body"];
        $m = strlen($str1);
        $n = strlen($str2);
        $L = $this->getLCS($str1, $str2, $m, $n);
        $removed = array_fill(0, $m + 1, false);
        $added = array_fill(0, $n + 1, false);
        $this->recursiveMark($L, $removed, $added, $m, $n);

        $offset = 0;
        foreach ($removed as $i => $val) {
            if ($val) {
                $first = substr($str1, 0, $i + $offset - 1);
                $second = substr($str1, $i + $offset - 1, 1);
                $third = substr($str1, $i + $offset);
                $str1 = $first . '<span class="removed">' . $second . '</span>' . $third;
                $offset += 29;
            }
        }

        $offset = 0;
        foreach ($added as $i => $value) {
            if ($value) {
                $first = substr($str2, 0, $i + $offset - 1);
                $second = substr($str2, $i + $offset - 1, 1);
                $third = substr($str2, $i + $offset);
                $str2 = $first . '<span class="added">' . $second . '</span>' . $third;
                $offset += 27;
            }
        }
//
//        $submission1->submission["body"] = $str1;
//        $submission2->submission["body"] = $str2;

        $str1 = nl2br($str1);
        $str2 = nl2br($str2);
        return view('submission.test')->with('str1', $str1)
            ->with('str2', $str2);
    }

    /**
     * @param $str1
     * @param $str2
     * @param $m
     * @param $n
     * @return mixed
     */
    private function getLCS($str1, $str2, $m, $n)
    {
        $L = $this->makeArray($m + 1, $n + 1);

        // Following steps build L[m+1][n+1] in
        // bottom up fashion. Note that L[i][j]
        // contains length of LCS of str1[0..i-1]
        // and str2[0..j-1]
        for ($i = 0; $i <= $m; $i++) {
            for ($j = 0; $j <= $n; $j++) {
                if ($i == 0 || $j == 0)
                    $L[$i][$j] = 0;

                else if (!strcasecmp(substr($str1, $i - 1, 1), substr($str2, $j - 1, 1)))
                    $L[$i][$j] = $L[$i - 1][$j - 1] + 1;
                else
                    $L[$i][$j] = ($L[$i - 1][$j] > $L[$i][$j - 1]) ? $L[$i - 1][$j] : $L[$i][$j - 1];
            }
        }

        // L[m][n] contains length of LCS
        // for X[0..n-1] and Y[0..m-1]
        return $L;
    }

    private function makeArray($m, $n)
    {
        $arr = [];
        for ($i = 0; $i < $m; $i++) {
            $arr[] = array_fill(0, $n, 0);
        }

        return $arr;
    }

    private function recursiveMark(&$L, &$removed, &$added, $m, $n)
    {
        if ($m == 0 && $n == 0)
            return;

        if ($m > 0 && $L[$m][$n] == $L[$m - 1][$n]) {
            // |
            $removed[$m] = true;
            $this->recursiveMark($L, $removed, $added, $m - 1, $n);


        } else if ($n > 0 && $L[$m][$n] == $L[$m][$n - 1]) {
            // -
            $added[$n] = true;
            $this->recursiveMark($L, $removed, $added, $m, $n - 1);

        } else if ($m > 0 && $n > 0 && $L[$m][$n] == $L[$m - 1][$n - 1] + 1) {
            // \
            $this->recursiveMark($L, $removed, $added, $m - 1, $n - 1);
        }
    }
}
