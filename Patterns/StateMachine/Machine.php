<?php

require 'Patterns/StateMachine/State.php';
require 'Patterns/StateMachine/OnState.php';
require 'Patterns/StateMachine/OffState.php';

/**
 * ATech TI
 * Consultoria e Treinamentos em Informática
 * 
 * Description of Machine
 *
 * @author  dos Santos, Anderson Henrique
 * @email   myatech@yahoo.com.br
 * @phone   +55 3598128523
 */
class Machine {

    /** @var Machine */
    private static $_instance = NULL;

    /** @var State */
    protected $_state;

    // Inicializa a Machine com o estado fundamental e
    // Evita que seja instanciada publicamente
    protected function __construct() {
        $this->_state = new OffState;
    }

    // Evita que a classe seja clonada
    private function __clone() {
        ;
    }

    public static function getInstance() {
        if (!self::$_instance) {
            try {
                self::$_instance = new Machine;
            } catch (Exception $e) {
                echo 'Error.<br />';
                echo "Sorry, an error has occurred. Please try your request later<br />" . $e->getMessage();
            }
        }
        return self::$_instance;
    }

    public function setState(State $state) {
        $this->_state = $state;
    }

    public function getState() {
        return $this->_state;
    }

    protected function transaction($state, $event) {
        if ($state instanceof State) {
            $reflectionClass = new ReflectionClass($state);
            if ($reflectionClass->getMethod($event)) {
                $reflectionMethod = new ReflectionMethod($state, $event);
                return $reflectionMethod->invoke($state);
            } else {
                throw new Exception('Nonexistent event!');
            }
        } else {
            throw new Exception('Nonexistent state!');
        }
    }

    public function onEvent() {
        return $this->transaction($this->_state, 'on');
    }

    public function offEvent() {
        return $this->transaction($this->_state, 'off');
    }

}