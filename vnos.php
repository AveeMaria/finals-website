<?php
if(!isset($_GET)) {
	die('get not set');
}

if(!isset($_GET['attacker']) || !isset($_GET['defender'])) {
	die('attacker/defender not set');
}

$attacker = trim($_GET['attacker'], "\"'");
$defender = trim($_GET['defender'], "\"'");

$regex = '/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/';

if (!preg_match($regex, $attacker)) {
    die('invalid attacker IP');
}
if (!preg_match($regex, $defender)) {
    die('invalid defender IP');
}

require_once 'conn.php';

vpisi($_GET['attacker'], $_GET['defender'])
?>