<?php

define('DEBUG',true);

include 'config/config.php';

$_json = file_get_contents("config/devices.json");
$_rooms = json_decode($_json, true);


foreach ($_GET as $key => $value) {
    switch ($key) {
        case 'on' :
            turnOn($value);
            break;
        case 'off' :
            turnOff($value);
            break;
        case 'status' :
            getStatus($value);
            break;
		case 'getDevices' :
            getDevices();
            break;
        default :
            echo 'unknown requeste';
            break;
    }
}

function turnOn($id)  {
    global $target, $port;
    $output = $id . "15"; // 1 -> on ; 5-> delay 5s
    if (DEBUG) { error_log("Picontrol: turnOn " . $id); }
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Could not create socket\n");
    socket_bind($socket, $_SERVER['SERVER_ADDR']) or die("Could not bind to socket\n");
    socket_connect($socket, $target, $port) or die("Could not connect to socket\n");
    socket_write($socket, $output, strlen ($output)) or die("Could not write output\n");
    socket_close($socket);
}

function turnOff($id)  {
    global $target, $port;
    $output = $id . "05"; // 1 -> on ; 5-> delay 5s
    if (DEBUG) { error_log("Picontrol: turnOff " . $id); }

    $output = $id . "0"; // 1 -> on ; 5-> delay 5s
  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Could not create socket\n");
  socket_bind($socket,  $_SERVER['SERVER_ADDR']) or die("Could not bind to socket\n");
  socket_connect($socket, $target, $port) or die("Could not connect to socket\n");
  socket_write($socket, $output, strlen ($output)) or die("Could not write output\n");
  socket_close($socket);
}

function getStatus($id)  {
    global $target, $port;
    if (DEBUG) { error_log("Picontrol: getStatus " . $id); }
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Could not create socket\n");
    socket_bind($socket,  $_SERVER['SERVER_ADDR']) or die("Could not bind to socket\n");
    socket_connect($socket, $target, $port) or die("Could not connect to socket\n");

    $output = $id . "25"; // 1 -> on ; 5-> delay 5s
    socket_write($socket, $output, strlen ($output)) or die("Could not write output\n");
    $state = socket_read($socket, 2048);
    if (DEBUG) { error_log("Picontrol: state for " . $id . " is " . $state); }
    if ($state == 0) {
    	echo "false";
   		return 1; // on 
    }
	else if ($state == 1) {
		echo "true";
	return 0; 
    }
}

function getDevices() {
	global $_json;
	global $_devices;
	echo $_json;
	
	echo "<pre>";
	//echo "QUERY_STRING : " . $_SERVER['QUERY_STRING'] . "<br />"; 
	var_dump($_devices);
	echo "</pre>";
}

?>
