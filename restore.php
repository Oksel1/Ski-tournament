<?php

$restore = false;

if (!isset($_SESSION['rdata'])) {

	$restore = true;	
	$debug = 'restore.php: ';
		
	$query = "select count(idZawodnik) from zawodnik z group by z.plec order by z.plec";
	[$lk, $lm] = fstcolDB($dbname, $query);
	$lz = $lk + $lm;
	$debug .= "lkmz: $lk, $lm, $lz ";

	$query = "select MAX(nrPrzejazdu) from przejazd";
	$rnd = max(1,intval(fstcolDB($dbname, $query)[0]));

	$query = "select idZawodnika from przejazd p where p.nrPrzejazdu = $rnd";
	$res = fstcolDB($dbname, $query);
	$rcnt = count($res);
	if ($rcnt==$lz) {
		 $res = [];
		 ++$rnd;
	}

	if ($rnd > $MAXRND) {
		// header("Location: ");
		 exit("Axe CUP has finnished");
	}

	$excl = implode(',',$res);

	$debug .= "rnd: $rnd ";
	$debug .= "done: $rcnt ";
	$debug .= "excl: $excl ";

	$query = "select idZawodnik from zawodnik z where z.idZawodnik not in ({$excl}) order by z.plec";
	$stl = fstcolDB($dbname, $query);

	$gndr = 'k';

	if (count($stl) > $lm) {
		 array_splice($stl, -$lm);
	} else $gndr = 'm';

	$incl = implode(',', $stl);
	$debug .= "stl: " . $incl . $gndr;

	$query = "select nrZawodnika as Nr, nazwisko || ' ' || imie as Zawodnik, idZawodnik as id from zawodnik as z" .
				" where (z.plec = '$gndr') and z.idZawodnik in ({$incl})" .
				" order by nrZawodnika asc";

	$stl = queryDB($dbname, $query);
	
	// $_SESSION['running'] = array_shift($stl);
	$_SESSION['rdata'] = [$stl, $rnd, $gndr];

}

// TO DO: check integrity

[$stl, $rnd, $gndr] = $_SESSION['rdata'];

if (empty($stl)) {
	if ($gndr == 'k') {
		$gndr = 'm';
	} else {
		$gndr = 'k';
		++$rnd;
	}
	if ($rnd > $MAXRND) {
		// header("Location: ");
		 exit("Axe CUP has finnished");
	}
	
	$query = "select nrZawodnika as Nr, nazwisko || ' ' || imie as Zawodnik, idZawodnik as id from zawodnik as z" .
				" where (z.plec = '$gndr')" .
				" order by nrZawodnika asc";

	$stl = queryDB($dbname, $query);
	
	// $_SESSION['running'] = array_shift($stl);
	$_SESSION['rdata'] = [$stl, $rnd, $gndr];
}




