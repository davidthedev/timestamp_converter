<?php

class Controller
{
    private $converter;

    public function __construct($converter)
    {
        $this->converter = $converter;
    }

    public function setUp($data = [])
    {
        $this->converter->setUp($data);
    }

    public function convert()
    {
        $this->converter->run();
    }
}
