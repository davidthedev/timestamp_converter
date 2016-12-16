<?php

spl_autoload_register(function($class) {
    require_once $class . '.php';
});

$converter = new Converter;
$controller = new Controller($converter);

// process the app depending on the interface
if (php_sapi_name() === 'cli') {

    StdInOut::read('Hey! Tell me what you would like to convert:');
    StdInOut::read('Select from the following options');
    StdInOut::read('1) Unix timestamp to date');
    StdInOut::read('2) Date to Unix timestamp');
    $conversionChoice = StdInOut::get();

    switch ($conversionChoice) {
        case 1:
            $convertTo = 'td-submit';
            StdInOut::readNewLine('Enter timestamp');
            $timestamp = StdInOut::get();
            // choose output date format
            StdInOut::readNewLine('Choose date format:');
            StdInOut::read('1) Day-Month-Year');
            StdInOut::read('2) Month-Day-Year');
            StdInOut::read('3) Year-Month-Day');
            $dateFormat = StdInOut::get();
            break;
        case 2:
            $convertTo = 'dt-submit';
            StdInOut::readNewLine('Enter date in the following format');
            StdInOut::read('Day-Month-Year Hour(24-hour):Minute:Second');
            StdInOut::read('DD-MM-YYYY HH:MM:SS');
            $datetime = StdInOut::get();
            break;
        default:
            StdInOut::read('Sorry, quiting the app. You did not enter your name');
            break;
    }

    $controller->setUp([
        'timestamp' => isset($timestamp) ? $timestamp : '',
        'datetime' => isset($datetime) ? $datetime : '',
        'dateformat' => isset($dateFormat) ? $dateFormat : '',
        $convertTo => ''
    ]);

    StdInOut::readResult($converter->run());
    StdInOut::readMessage();
} else {

    $controller->setUp();

    if (Request::get() != null) {
        $controller->setUp(Request::get());
        $controller->convert();
    }

    $view = new View($converter);
    $view->render();
}
