<?php
require "Geocoding.php";

use myPHPnotes\Geocoding;

$geo = new Geocoding("AIzaSyClLSNOdhgaGkctOq69ph461ZXRGUs3W-E");

$coordinates = $geo->getCoordinates("Britam Tower, Nairobi");
 var_dump($coordinates);


?>