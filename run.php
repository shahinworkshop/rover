<?php
/**
 * Include loader file for auto class and interfaces for our application
 */
require 'loader.php';
require 'vendor/autoload.php';

use App\Model\Plateau\Plateau;
use App\Model\Rover\RoverSetup;
use App\Model\Rover\Rover;
use App\Model\Move\Direction;
use App\Model\Reader\Reader;
use App\Model\Rover\RoverSquad;
use App\controller\Printer;
use App\Model\Commands\Directions;

/**
 * Read commands from txt file
 */
$reader = new Reader(APP_PATH . 'commands.txt');

/**
 * Direction commands
 */
$directionCommands = new Directions();
$directionCommands->setCommand('L', new \App\Model\Move\RotateLeft());
$directionCommands->setCommand('M', new \App\Model\Move\Move());
$directionCommands->setCommand('R', new \App\Model\Move\RotateRight());

/**
 * Run application
 */
$lineCounter = 0;
$roverSquad = new RoverSquad();
foreach ($reader as $input) {
    $commandResult = false;
    $lineCounter++;
    if ($lineCounter === 1) {
        $plateau = new Plateau();
        $plateau->execute($input);
    } else {
        if (($lineCounter % 2) === 0) {
            $roverSetup = new RoverSetup();
            $roverSetup->setPlateau($plateau);
            $rover = $roverSetup->setup(new Rover(), $input);
        } else {
            $direction = new Direction();
            $direction->commands($directionCommands);
            $direction->setPlateau($plateau);
            $rover = $direction->setup($rover, $input);
            $roverSquad->setRover($rover);
        }
    }
}

/**
 * Print result
 */
(new Printer())->rovers($roverSquad);