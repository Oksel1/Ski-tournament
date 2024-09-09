<?php

require_once "db_utils_new.php";

session_start();

// ilosc rund
$MAXRND = 4;
// nazwa bazy
$dbname = 'axecup.db';

$debug = "session: ";
$res = [];

include "restore.php";

// form actions POST
// $running = $stl[0];


if (isset($_SESSION['running']) && isset($_POST['action'])) {
	// $debug .= "action: {$_POST['action']} ";
	$running = array_shift($stl);
	switch ($_POST['action']) {
		case "OK":
			// insert result
			$query = "INSERT INTO `Przejazd`(`idZawodnika`,`nrPrzejazdu`,`czas`,`bonusy`,`opis`,`dsq`) " .
						"VALUES ({$_SESSION['running']['id']},{$rnd},{$_POST['czas']},{$_POST['bonus']},NULL,0)";
			insertDB($dbname, $query);
			break;
		case "DSQ":
			// insert dsq
			$query = "INSERT INTO `Przejazd`(`idZawodnika`,`nrPrzejazdu`,`czas`,`bonusy`,`opis`,`dsq`) " .
						"VALUES ({$_SESSION['running']['id']},{$rnd},0.0,0,'{$_POST['opis']}',1)";
			insertDB($dbname, $query);
			break;
		case "Next":
			// exchange pending top
			if (!empty($stl)) {
				$running = array_shift($stl);
				array_unshift($stl, $_SESSION['running']);
			}
			array_unshift($stl, $running);
			$debug .= "action: {$_POST['action']} ";
			break;
		case "Last":
			// running to the end
			array_push($stl, $_SESSION['running']);
			$debug .= "action: {$_POST['action']} ";
			break;
	}
	// $_SESSION['running'] = $running;
	$_SESSION['rdata'] = [$stl, $rnd, $gndr];
}

if (!empty($stl)) {
	$running = array_shift($stl);
	$_SESSION['running'] = $running;
} else {
	// $form = " Round has finished <br>
			// <a href="index.php">START</a>
			// <button onclick='location.href='http://www.example.com'' type='button'>
         // Go to next round</button>
	// ";
	$form = "	
		<form>
			Round has finished <br>
			<button formaction='run.php' formmethod='POST'>Go to next run</button>
		</form>
	";
	unset($_SESSION['running']);
}

// $pending = make_html_table($full, "Start list", "start-list");
$pending = table_from_cols($stl, ["Nr", "Zawodnik"], "Start list", "start-list");

$query = "select nrZawodnika as Nr, nazwisko || ' ' || imie as Zawodnik, " .
			" czas, bonusy, dsq as DSQ, opis, idZawodnik as id from zawodnik as z, przejazd as p" .
			" where z.plec = '$gndr' and z.idZawodnik = p.idZawodnika and p.nrPrzejazdu = $rnd" .
			// " order by nrZawodnika desc";
			" order by idPrzejazdu desc";
			
$res = queryDB($dbname, $query);

if (!empty($res)) 
	$finished = make_html_table($res, "Finished", "finished");
else
	$finished = "No one has started yet this run";


// $fc = ["rnr" => $rnd, "znr" => 42, "name" => "John Example"];
// $fc = [$rnd, 42, "John Example"];
$fc = [$rnd, $running["Nr"], $running["Zawodnik"], $gndr=='k'?"Kobiety":"Mężczyźni"];

if (!isset($debug))
	$debug = 'No debug';
// if (isset($_SESSION['running']))
	// array_unshift($stl, $running);


include "run_layout.php";

?>

