<?php

// $_SESSION['db'] = "sqlite:db/axecup.db";


$actions['del'] = "Usuń";
$actions['edit'] = "Edytuj";

function just_query($query) {
	// $conn = new PDO($_SESSION['db']);
	$my_db = "sqlite:db/axecup.db";
	$conn = new PDO($my_db);
	$st = $conn->prepare($query);
	$st->execute();
	$wyniki = array();
	while($row = $st->fetch(PDO::FETCH_ASSOC)) {
		$row['czas'] = str_replace(',','.',$row['czas']);
		array_push($wyniki, $row);
	}
	$conn = null;
	return $wyniki;
}

function table_from_query($query, $caption) {
	$result = just_query($query);
	return make_html_table($result, $caption);
}

function table_with_GET_links_from_query($query, $caption, $link, $field) {
	$result = just_query($query);
	return make_html_table_with_GET_links($result, $caption, $link, $field);
}

function table_with_actions_from_query($query, $caption, $link) {
	$result = just_query($query);
	return make_html_table_with_actions($result, $caption, $link);
}

function make_html_table_with_actions($data, $caption, $script) {
	$actions['edit'] = "Edytuj";
	$actions['del'] = "Usuń";
	
	$headers = array_keys($data[0]);
	$table = "
		<table id='data_table' >
			<caption>$caption</caption>
			<tr>";
	foreach ($headers as $th) {
		$table .= "<th>$th</th>";
	}
	
	foreach ($actions as $th) {
		$table .= "<th>$th</th>";
	}
	$table .= "</tr>";
	foreach ($data as $row) {
		$table .= "<tr>";
		foreach ($headers as $h) {
			$table .= "<td>{$row[$h]}</td>";
		}
		foreach (array_keys($actions) as $a) {
			$href = "$script?a=$a&id={$row['Id']}";
			$table .= "<td><a href='$href'>{$actions[$a]}</a></td>";
			// $table .= "<td><button type='submit' formaction='$href'>$a</button></td>";
			 // <button type="submit" formaction="/action_page2.php">Submit to another page</button>
		}
		
		$table .= "</tr>";
	}
	$table .= "</table>";
	return $table;
}

function make_html_table_with_GET_links($data, $caption, $link, $field) {
	$headers = array_keys($data[0]);
	$table = "
		<table id='data_table' >
			<caption>$caption</caption>
			<tr>";
	foreach ($headers as $h) {
		$table .= "<th>$h</th>";
	}
	$table .= "</tr>";
	foreach ($data as $row) {
		$href = "$link?field={$row[$field]}";
		$table .= "<tr a href='$href'>";
		foreach ($headers as $h) {
			$table .= "<td>{$row[$h]}</td>";
		}
		$table .= "</tr>";
	}
	$table .= "</table>";
	return $table;
}

function make_html_table($data, $caption) {
	$headers = array_keys($data[array_key_first($data)]);
	// $headers = ["Przejazd ", "Zawodnik", "nr przejazdu", "czas", "Bonifikata", "opis"];
	$table = "
		<table id='data_table' >
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

function select_fields_from_table($fields, $table) {
	$conn = new PDO($_SESSION['db']);
	$query='SELECT ' . $fields . ' FROM ' . $table;
	$st=$conn->prepare($query);
	// $st->bindValue(":table", $table, PDO::PARAM_STR);
	// $st->bindValue(":password", $password, PDO::PARAM_STR);
	$st->execute();
	//$row=$st->fetch(PDO::FETCH_ASSOC);

	$wyniki = array();
	while($row=$st->fetch(PDO::FETCH_ASSOC)) {
		array_push($wyniki, $row);
	}
	$conn = null;
	return $wyniki;
}

// foreach ($row as $cell)


// echo "terazłącczę: ";
// // $conn = new PDO("sqlite:db/baza_nastaw.db");
	// // echo $_SESSION['db'];
	// // var_dump($conn);
	// // echo "\nkoniec";
// // $conn = null;

// $conn = new PDO("sqlite:db/baza_nastaw.db");
	// // $conn = new PDO($_SESSION['db']);
	// echo $_SESSION['db'];
	// var_dump($conn);
	// $query='SELECT rowid,* FROM ' .'user'; //user WHERE username=:login && password=:password';
	// $st=$conn->prepare($query);
	
	// //$st->bindValue(":table", $table, PDO::PARAM_STR);
	// // $st->bindValue(":password", $password, PDO::PARAM_STR);
	// $st->execute();
	// //$row=$st->fetch(PDO::FETCH_ASSOC);

	// $wyniki = array();
	// while($row=$st->fetch(PDO::FETCH_ASSOC)) {
		// array_push($wyniki, $row);
	// }
	// $conn = null;