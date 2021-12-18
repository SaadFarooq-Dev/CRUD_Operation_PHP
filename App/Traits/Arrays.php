<?php

trait Arrays
{

    public static function getKeysStrings($arr)
    {
        return implode(", ", array_keys($arr));
    }

    public static function getBlanks($arr)
    {
        //? , ? , ? , ? , ?
        $blank = "";
        for ($i = 0; $i < count($arr) - 1; $i++) {
            $blank .= "? , ";
        }
        $blank .= "?";
        return $blank;
    }

    public static function getValuesArray($arr)
    {
        return array_values($arr);
    }
    public static function getArrAttributes($arr)
    {
        return implode("=? , ", array_keys($arr)) . "=?";
    }
}
