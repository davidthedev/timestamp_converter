<?php

class View
{
    private $converter;

    public function __construct($converter)
    {
        $this->converter = $converter;
    }

    public function render()
    {
        $dateFormat = $this->converter->getDateFormat();
        $datetime = $this->converter->getDatetime();
        $timestamp = $this->converter->getTimestamp();
        $output = $this->converter->getOutput();

        require_once $this->converter->getTemplate();
    }
}
