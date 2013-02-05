<?php require 'Patterns/StateMachine/Machine.php';

$machine = Machine::getInstance();
// var_dump($machine);

try {
    $machine->offEvent();
    $machine->onEvent();
    $machine->onEvent();
    $machine->offEvent();
    $machine->offEvent();
    $machine->onEvent();
} catch (Exception $e) {
    echo $e->getMessage();
}