<?php
//temperature.php

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
// display results if user has entered a temperature
if(isset($_POST['Temperature']))
{
    $T = $_POST['Temperature'];
    $U = $_POST['Units'];
    if (!is_numeric($T)) {
        echo "Please enter a valid number.";
    }
    elseif ($U == 'Fahrenheit' && $T < -459.67) {
        echo "Temperatures below -459.67 degrees Fahrenheit are impossible!";
    }
    elseif ($U == 'Celsius' && $T < -273.15) {
        echo "Temperatures below -273.15 degrees Celsius are impossible!";
    }
    elseif ($U == 'Kelvin' && $T < 0) {
        echo "Temperatures below 0 Kelvin are impossible!";
    }
    else {
        // convert user input to a float value
        $temperature = floatval($T);

        // determine which temperature type the user has selected and echo appropriate results
        switch($U)
        {
            case 'Fahrenheit':
                echo 'You entered ' . $T . ' degrees Fahrenheit <br />';
                echo 'The Celsius equivalent is ' . number_format((($temperature - 32) * 5/9), 2, '.', '') . '<br />';
                echo 'The Kelvin equivalent is ' . number_format((($temperature + 459.67) * 5/9), 2, '.', '') . '<br />';
                break;
            case 'Celsius':
                echo 'You entered ' . $T . ' degrees Celsius <br />';
                echo 'The Fahrenheit equivalent is ' . number_format((($temperature * 9/5 + 32)), 2, '.', '') . '<br />';
                echo 'The Kelvin equivalent is ' . number_format((($temperature + 273.15)), 2, '.', '') . '<br />';
                break;
            case 'Kelvin':
                echo 'You entered ' . $T . ' kelvins <br />';
                echo 'The Fahrenheit equivalent is ' . number_format((($temperature * 9/5 - 459.67)), 2, '.', '') . '<br />';
                echo 'The Celsius equivalent is ' . number_format((($temperature - 273.15)), 2, '.', '') . '<br />';
                break;
        }
    }
}
// display temperature form
else
{
    echo
    '
    <form method="post" action="' . THIS_PAGE . '">
    Temperature <input type="text" name="Temperature" /> <br />
    <select name="Units">
        <option value="Fahrenheit">Fahrenheit</option>
        <option value="Celsius">Celsius</option>
        <option value="Kelvin">Kelvin</option>
    </select> <br /> <br />
    <input type="submit" value="Convert" />
    </form>
    ';
}
