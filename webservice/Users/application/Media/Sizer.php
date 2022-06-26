<?php

class Sizer
{
    static public function verify($name, $size)
    {
        if (empty($name) || $size <= 666773) {
            return false;
        }
    }
}
