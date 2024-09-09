<?php

// $actions['del'] = "Usuń";
// $actions['edit'] = "Edytuj";


function insertDB($dbname, $query) {

	$conn = new PDO("sqlite:db/$dbname");
	$st = $conn->prepare($query);
	$result = $st->execute();
	$conn = null;
	return $result;

}

function queryDB($dbname, $query) {
	
	$conn = new PDO("sqlite:db/$dbname");
	$st = $conn->prepare($query);
	$st->execute();
	$wyniki = array();
	while($row = $st->fetch(PDO::FETCH_ASSOC)) {
		array_push($wyniki, $row);
	}
	$conn = null;
	return $wyniki;
}

function fstcolDB($dbname, $query) {
	
	$conn = new PDO("sqlite:db/$dbname");
	$st = $conn->prepare($query);
	$st->execute();
	$wyniki = array();
	while($row = $st->fetch(PDO::FETCH_BOTH)) {
		array_push($wyniki, $row[0]);
	}
	$conn = null;
	return $wyniki;
}


function make_html_table($data, $caption, $id) {
	if (empty($data))
		return "no data for table";
	$headers = array_keys($data[array_key_first($data)]);
	// $headers = ["Przejazd ", "Zawodnik", "nr przejazdu", "czas", "Bonifikata", "opis"];
	// style='display: none;'
	$table = "
		<table id='$id'>
			<caption>$caption</caption>
			<tr>";
	foreach ($headers as $h) {
		$table .= "<th>$h</th>";
	}
	$table .= "</tr>\n";
	foreach ($data as $row) {
		$table .= "<tr>";
		// foreach ($headers as $h) {
			// $table .= "<td>{$row[$h]}</td>";
		// }
		foreach ($row as $r) {
			$table .= "<td>{$r}</td>";
		}
		$table .= "</tr>\n";
	}
	$table .= "\n</table>\n";
	return $table;
}


function table_from_cols($data, $headers, $caption, $id) {
	
	$table = "
		<table id='$id'>
			<caption>$caption</caption>
			<tr>";
	foreach ($headers as $h) {
		$table .= "<th>$h</th>";
	}
	$table .= "</tr>\n";
	
	foreach ($data as $row) {
		$table .= "<tr>";
		foreach ($headers as $h) {
			$table .= "<td>{$row[$h]}</td>";
		}
		$table .= "</tr>\n";
	}
	$table .= "\n</table>\n";
	return $table;
}

