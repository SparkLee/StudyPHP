<?php
error_reporting(0);
require_once 'Calendar/Month.php';

$Month = new Calendar_Month(2015, 04);

$Month->build(); // Build the days in the month

// Loop through the days...
while ($Day = $Month->fetch()) {
    echo $Day->thisDay().'<br />';
}
