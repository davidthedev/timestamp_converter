<?php

class StdInOut
{
    public static function read($string = '')
    {
        echo $string . "\n";
    }

    public static function readNewLine($string = '')
    {
        echo "\n" . $string . "\n";
    }

    public static function readResult($string = '')
    {
        echo "\n" . 'Result >>>> ' . $string . "\n";
    }

    public function readMessage()
    {
        echo "\n" . 'Thank you for using the converter. Have a great day!' . "\n\n";
    }

    public static function get()
    {
        return trim(fgets(STDIN));
    }
}
