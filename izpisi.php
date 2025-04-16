<?php
//http://localhost/game/izpisi.php?n=4&o=10
if(!isset($_GET)) {
	die('get not set');
}

if(!isset($_GET['n']) || !isset($_GET['o'])) {
	die('number / offset not set');
}

$n = trim($_GET['n'], "\"'");
$o = trim($_GET['o'], "\"'");

$regex = '/^\d{1,2}$/';

if (!preg_match($regex, $n)) {
    die('invalid number');
}
if (!preg_match($regex, $o)) {
    die('invalid offset');
}

require_once 'conn.php';

izpisi($n,$o);

?>