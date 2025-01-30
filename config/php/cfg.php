<?php
// This is a php config file for the website
//
// If you want to change database login, prefix, etc
// You can do so by going to /config/php/db.php

// ================
// Website modes
// ================
$mode_maintenance = false;
if($mode_maintenance == true) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/maintenance.php');
}

$mode_registration = true; // Disables/Enables registration, if set to true registration will be available to ANYONE

?>