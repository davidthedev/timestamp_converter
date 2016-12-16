<?php

class Request
{
    public static function get()
    {
        if ($_SERVER['REQUEST_METHOD']) {
            if (
                $_SERVER['REQUEST_METHOD'] === 'GET' &&
                isset($_GET) &&
                !empty($_GET)
            ) {
                return $_GET;
            } elseif (
                        $_SERVER['REQUEST_METHOD'] === 'POST' &&
                        isset($_POST) &&
                        !empty($_POST)
            ) {
                return $_POST;
            } else {
                return null;
            }
        }
    }
}
