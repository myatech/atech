<?php

/**
 * ATech TI
 * Consultoria e Treinamentos em Informática
 * 
 * Description of Off
 *
 * @author  dos Santos, Anderson Henrique
 * @email   myatech@yahoo.com.br
 * @phone   +55 3598128523
 */
class OffState implements State {

    public function off() {
        // throw new Exception('The machine already is off!');
        echo 'The machine already is off!<br />';
    }

    public function on() {        
        Machine::getInstance()->setState(new OnState);
        echo 'Machine on,...<br />';
    }

}