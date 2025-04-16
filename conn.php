<?php
$conn = new mysqli("localhost", "root", "","game");

if(!$conn) {
	die("conn error");
}

function vpisi($defender, $attacker) {
	global $conn;

	$q = "INSERT INTO GameLog (Attacker, Defender, date, time)
	      VALUES (?, ?, CURDATE(), CURTIME());";

	$stmt = $conn->prepare($q);

	if (!$stmt) {
		die("Prepare failed: " . $conn->error);
	}

	$stmt->bind_param('ss', $attacker, $defender);

	if (!$stmt->execute()) {
		die("Execute failed: " . $stmt->error);
	}

	$stmt->close();
}

function izpisi($number, $offset) {
	global $conn;

	$q = "SELECT Attacker, Defender, Date, Time FROM GameLog ORDER BY Date, Time DESC LIMIT ? OFFSET ?;";

	$stmt = $conn->prepare($q);
	
	if (!$stmt) {
		die("Prepare failed: " . $conn->error);
	}

	$stmt->bind_param("ii", $number, $offset);

	if (!$stmt->execute()) {
		die("Execute failed: " . $stmt->error);
	}

	$result = $stmt->get_result();
	
	$data = array();
	
	while ($row = $result->fetch_assoc()) {
		$data[] = $row;
	}
	echo json_encode($data);
}


?>