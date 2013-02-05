<?php require 'Patterns/StateMachine/Machine.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>       
        <h1>Simulate the Machine</h1>
        <?php
            if($_POST) {
                
                if ($_POST['on'] == 'TurnOn') {
                    Machine::getInstance()->onEvent();
                } 
                
                if ($_POST['on'] == 'TurnOff') {
                    Machine::getInstance()->offEvent();
                }
            }
        ?>   
        <br />
        <form name="machine" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" value="TurnOn" name="on" />
            <input type="submit" value="TurnOff" name="on" />
        </form>
    </body>
</html>
