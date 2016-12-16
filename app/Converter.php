<?php

class Converter
{
    private $timestamp;
    private $dateFormat;
    private $datetime;

    private $convertTo;

    private $output;
    private $template;

    public function setTimestamp($timestamp = '')
    {
        $this->timestamp = time();
        if (!empty($timestamp)) {
            $this->timestamp = $timestamp;
        }
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    private function setDatetime($datetime = '')
    {
        $this->datetime = date('d-m-Y H:i:s');

        if (!empty($datetime)) {
            $this->datetime = $datetime;
        }
    }

    public function getDatetime()
    {
        return $this->datetime;
    }

    private function setOutput($output)
    {
        $this->output = $output;
    }

    public function getOutput()
    {
        return $this->output;
    }

    private function setDateFormat($dateFormat)
    {
        switch ($dateFormat) {
            case 1:
                $this->dateFormat = 'd-m-Y';
                break;
            case 2:
                $this->dateFormat = 'm-d-Y';
                break;
            case 3:
                $this->dateFormat = 'Y-m-d';
                break;
            default:
                $this->dateFormat = 'd-m-Y';;
                break;
        }
    }

    public function getDateFormat()
    {
        return $this->dateFormat;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function setUp($data)
    {
        $this->setTimestamp(isset($data['timestamp']) ? $data['timestamp'] : '');
        $this->setDatetime(isset($data['datetime']) ? $data['datetime'] : '');
        $this->setDateFormat(isset($data['dateformat']) ? $data['dateformat'] : '');

        if (isset($data['td-submit'])) {
            $this->convertTo = 'datetime';
        } elseif (isset($data['dt-submit'])) {
            $this->convertTo = 'timestamp';
        }

        $this->template = 'views/index.php';
    }

    public function run()
    {
        if ($this->convertTo == 'datetime') {
            $this->setOutput(date($this->getDateFormat(), $this->timestamp));
        } elseif ($this->convertTo == 'timestamp') {
            $this->setOutput(strtotime($this->datetime));
        }
        return $this->getOutput();
    }
}
