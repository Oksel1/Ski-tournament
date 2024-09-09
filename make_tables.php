<?php 
// echo "ready to go!<br>";

require_once "db_utils.php";

function make_tables($sex) {

	$my_db = "sqlite:db/axecup.db";

	// $sex = 'k';
	$usex = strtoupper($sex);

	$query = "select idZawodnik, imie, nazwisko, nrZawodnika, nrPrzejazdu, czas, bonusy, dsq from zawodnik as z, przejazd as p" .
				" where (z.plec = '$usex'  or z.plec = '$sex') and z.idZawodnik = p.idZawodnika" .
				// " where (z.plec = 'K'  or z.plec = 'k') and z.idZawodnik = p.idZawodnika and p.nrPrzejazdu = 2" .
				// " order by idZawodnik asc, nrPrzejazdu asc";
				" order by nrPrzejazdu asc";
	$debug = $query;
	$res = just_query($query);
	// print_r($res);

	$bt = [INF, -1];
	$brt = [INF, -1];
	$mb = [-1, -1];
	
	global $dbname;
	
	foreach ($res as $key => $r) {
		// print_r($r);
		// echo $r['bonusy'];
		// break;
		
		$res[$key]['czas'] = str_replace(',','.',$res[$key]['czas']);
		$coef = $dbname == 'axecup2023.db'?1:$r['nrPrzejazdu'];
		$res[$key]['czasbon'] = $res[$key]['czas'] - $r['bonusy']*(0.6 - $coef*0.1);
		

		
		if ($res[$key]['dsq']) {
			$res[$key]['czas'] = 0;
			$res[$key]['czasbon'] = 0;
			$res[$key]['bonusy'] = 0;
		} else {
			if ($res[$key]['czasbon'] < $bt[0]) {
				$bt[0] = $res[$key]['czasbon'];
				$bt[1] = $key;
			}
			if ($res[$key]['czas'] < $brt[0]) {
				$brt[0] = $res[$key]['czas'];
				$brt[1] = $key;
			}
			if ($res[$key]['bonusy'] > $mb[0]) {
				$mb[0] = $res[$key]['bonusy'];
				$mb[1] = $key;
			}
		}
		
		// Statystyki tutaj
		
	}
	$recs = array();
	$r = $res[$bt[1]];
	$recs['bt'] = "{$bt[0]} {$r['nazwisko']} {$r['imie']} [{$r['nrZawodnika']}] w {$r['nrPrzejazdu']}. przejeździe";
	$r = $res[$brt[1]];
	$recs['brt'] = "{$brt[0]} {$r['nazwisko']} {$r['imie']} [{$r['nrZawodnika']}] w {$r['nrPrzejazdu']}. przejeździe";
	$r = $res[$mb[1]];
	$recs['mb'] = "{$mb[0]} {$r['nazwisko']} {$r['imie']} [{$r['nrZawodnika']}] w {$r['nrPrzejazdu']}. przejeździe";
	
	
	$tabela = '';

	$i = 0;
	$n = count($res);

	$nr = 1;

	while ($i < $n) {
		
		$przejazd = array();
		$k = 0;
		while ($i < $n and $res[$i]['nrPrzejazdu'] == $nr) {
			array_push($przejazd, $res[$i]);
			if ($przejazd[$k]['dsq'])
				$przejazd[$k]['nrPrzejazdu'] = 0;
			$i++;
			$k++;
		}
		
		$nrp = array_column($przejazd, 'nrPrzejazdu'); 
		$czb = array_column($przejazd, 'czasbon'); 
		array_multisort($nrp, SORT_DESC, $czb, SORT_ASC, $przejazd);
		
		$final = array();
		$j = 0;

		foreach ($przejazd as $r) {
			$j += 1;
			$f = array();
			$f['Poz.'] = $j;
			// $f['Zawodnik'] = $r['imie'] . ' ' . $r['nazwisko'] . ' (' . $r['nrZawodnika'] . ')';
			// $f['Zawodnik'] = ' (' . $r['nrZawodnika'] . ') ' . $r['imie'] . ' ' . $r['nazwisko'];
			$f['Zawodnik'] =  $r['nazwisko'] . ' ' . $r['imie'] .  ' [' . $r['nrZawodnika'] . ']';	
			$f['Przejazdy'] = $r['nrPrzejazdu'];
			$f['Total'] = $r['czasbon'];
			$f['Strata'] = '';
			$f['Raw time'] = $r['czas'];
			$f['Bonusy'] = $r['bonusy'];
			$final[$j] = $f;
		}

		for (; $j > 1; $j--) {
			if ($final[$j]['Przejazdy'] == $final[1]['Przejazdy'])
				$final[$j]['Strata'] = '+' . ($final[$j]['Total'] - $final[1]['Total']);
			else {
				$symbol = '-';
				$final[$j]['Poz.'] = $symbol;
				$final[$j]['Total'] = $symbol;
				$final[$j]['Strata'] = $symbol;
				$final[$j]['Raw time'] = $symbol;
				$final[$j]['Bonusy'] = $symbol;
			}
			unset($final[$j]['Przejazdy']);
		}
		unset($final[1]['Przejazdy']);
		
		$id = "przejazd-$sex-$nr";
		$title = "Przejazd $nr";
		$tabela .= make_html_table($final, $title, $id);
		
		$nr++;
	}


	// -------------------- overall -------------------------------------
	// print_r($res);
	// array_splice($res,1,1);
	// print_r($res);

	$result = array_reduce($res, function($carry, $item){ 

		 if(!isset($carry[$item['idZawodnik']])){ 
			  $carry[$item['idZawodnik']] = $item;
			  $carry[$item['idZawodnik']]['nrPrzejazdu'] = 1;
			  if ($item['dsq']) {
				  $carry[$item['idZawodnik']]['nrPrzejazdu'] = 0;
			  }

		 } else { 
			  $carry[$item['idZawodnik']]['czas'] += $item['czas'];
			  $carry[$item['idZawodnik']]['czasbon'] += $item['czasbon']; 
			  $carry[$item['idZawodnik']]['bonusy'] += $item['bonusy'];

			  if (!$item['dsq']) {
				  $carry[$item['idZawodnik']]['nrPrzejazdu'] += 1;
			  }
		 } 
		 return $carry; 
	});

	$czb = array_column($result, 'czasbon'); 
	$nrp = array_column($result, 'nrPrzejazdu'); 
	array_multisort($nrp, SORT_DESC, $czb, SORT_ASC, $result);

	// print_r($result);

	$final = array();
	$i = 0;

	foreach ($result as $r) {
		$i += 1;
		$f['Poz.'] = $i;
		// $f['Zawodnik'] = $r['imie'] . ' ' . $r['nazwisko'] . ' (' . $r['nrZawodnika'] . ')';
		// $f['Zawodnik'] = ' (' . $r['nrZawodnika'] . ') ' . $r['imie'] . ' ' . $r['nazwisko'];
		$f['Zawodnik'] =  $r['nazwisko'] . ' ' . $r['imie'] .  ' [' . $r['nrZawodnika'] . ']';	
		$f['Przejazdy'] = $r['nrPrzejazdu'];
		$f['Total'] = $r['czasbon'];
		$f['Strata'] = ''; // $r[''];
		$f['Raw time'] = $r['czas'];
		$f['Bonusy'] = $r['bonusy'];
		$final[$i] = $f;
	}

	// $n = count($final);
	// $final[1] = $f;
	$ft = $final[1]['Total'];
	$mb = [$final[1]['Bonusy'], 1];


	for (; $i > 1; $i--) {
		if ($final[$i]['Przejazdy'] == $final[1]['Przejazdy'])
			$final[$i]['Strata'] = '+' . ($final[$i]['Total'] - $ft);
		if ($final[$i]['Bonusy'] > $mb[0]) {
				$mb[0] = $final[$i]['Bonusy'];
				$mb[1] = $i;
			}
	}

	$r = $final[$mb[1]];
	$recs['tmb'] = "{$mb[0]} {$r['Zawodnik']}";


	$tabela .= make_html_table($final, "Zawodnicy", "przejazd-$sex-0");

	return [$tabela, $recs];
	
}


