<?php

/**
 * ATech TI
 * Consultoria e Treinamentos em Informática
 * 
 * Description of On
 *
 * @author  dos Santos, Anderson Henrique
 * @email   myatech@yahoo.com.br
 * @phone   +55 3598128523
 */
class OnState implements State {

    public function off() {
        Machine::getInstance()->setState(new OffState);
        echo 'Machine off,...<br />';
    }

    public function on() {
        // throw new Exception('The machine already is on!');
        echo 'The machine already is on!<br />';
    }
    
}