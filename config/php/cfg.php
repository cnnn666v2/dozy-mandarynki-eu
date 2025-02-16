<?php
// This is a php config file for the website
//
// If you want to change database login, prefix, etc
// You can do so by going to /config/php/db.php

// ================
// Modes
// ================
$mode_maintenance = false;
if($mode_maintenance == true) { header('Location: http://'.$_SERVER['HTTP_HOST'].'/maintenance.php'); }

$mode_registration = true; # Disables/enables registration, if set to true registration will be available to ANYONE


// ================
// Services
// ================
$service_emailrecovery = true; # Disables/enables option for password reset via email, feature not finished and probably will never be

?>