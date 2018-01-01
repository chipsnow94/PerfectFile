<?php
use phpDocumentor\Reflection\File;

class PerfectFile
{
    const PERFECT_FILE = "Perfect File";
    const NOT_PERFECT_FILE = "Not Perfect File";
    const PERFECT_NUMBER=0;
    public function is_Perfect_File($Path)
    {
        $file_array = $this->readFile($Path);
        if ($this->is_Empty_File($file_array)) {
            return self::NOT_PERFECT_FILE;
        }
        foreach ($file_array as $rows) {
            $row = trim(str_replace("\r\n", "", $rows));//chuan hoa chuoi
            if (!$this->is_Perfect_Row($row)) {
                return self::NOT_PERFECT_FILE;
            }
        }
        return self::PERFECT_FILE;
    }
    private function is_Empty_File($array)
    {
        if ($array[0]==null) {
            return true;
        }
    }
    private function readFile($Path)
    {
        $file = fopen($Path, "r");
        if (!$file) {
            throw new InvalidArgumentException("File doesn't exist!");
        } else {
            while (!feof($file)) {
                $file_array[] = fgets($file);
            }
        }
        return $file_array;
    }
    private function is_Perfect_Row($row)
    {
        $row_sum = $count_pos = $count_neg = 0;
        $row = explode(" ", $row);
        foreach ($row as $num) {
            $num = trim($num);
            if (!$this->Is_Number($num)) {
                return false;
            }
            $num > 0 ? $count_pos++ : $count_neg++;
            $row_sum += $num;
        }
        if ($row_sum == self::PERFECT_NUMBER && $count_neg==$count_pos) {
            return true;
        } else {
            return false;
        }
    }
    private function Is_Number($num)
    {
        if (is_numeric($num)) {
            return true;
        }
    }
    // private function Is_Equal_Count($count_neg, $count_pos)
    // {
    //     if ($this->count_neg = $this->count_pos) {
    //         return true;
    //     }
    // }
}
