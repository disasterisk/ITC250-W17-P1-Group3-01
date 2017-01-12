<?php
//temperature.php

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

// display results if user has entered a temperature
if(isset($_POST['Temperature']))
{
    
    // convert user input to a float value
    $temperature = floatval($_POST['Temperature']);
    
    // determine which temperature type the user has selected and echo appropriate results
    switch($_POST['TemperatureType'])
    {
        case 'Fahrenheit':
            echo 'You entered ' . $_POST['Temperature'] . ' degrees Fahrenheit <br />';
            echo 'The Celsius equivalent is ' . number_format((($temperature - 32) * 5/9), 2, '.', '') . '<br />';
            echo 'The Kelvin equivalent is ' . number_format((($temperature + 459.67) * 5/9), 2, '.', '') . '<br />';
            break;
        case 'Celsius':
            echo 'You entered ' . $_POST['Temperature'] . ' degrees Celsius <br />';
            echo 'The Fahrenheit equivalent is ' . number_format((($temperature * 9/5 + 32)), 2, '.', '') . '<br />';
            echo 'The Kelvin equivalent is ' . number_format((($temperature + 273.15)), 2, '.', '') . '<br />';
            break;
        case 'Kelvin':
            echo 'You entered ' . $_POST['Temperature'] . ' kelvins <br />';
            echo 'The Fahrenheit equivalent is ' . number_format((($temperature * 9/5 - 459.67)), 2, '.', '') . '<br />';
            echo 'The Celsius equivalent is ' . number_format((($temperature - 273.15)), 2, '.', '') . '<br />';
            break;
    }
    

    
}
// display temperature form
else
{
    echo 
    '
    <form method="post" action="' . THIS_PAGE . '">
    Temperature <input type="text" name="Temperature" /> <br />  
    <select name="TemperatureType">
        <option value="Fahrenheit">Fahrenheit</option>
        <option value="Celsius">Celsius</option>
        <option value="Kelvin">Kelvin</option>
    </select> <br /> <br />
    <input type="submit" value="Convert" />
    </form>    
    ';
}