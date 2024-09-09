<?php 
// echo "ready to go!<br>";

require_once "db_utils.php";

$my_db = "sqlite:db/axecup.db";

$query = "select idZawodnik, imie, nazwisko, nrZawodnika, nrPrzejazdu, czas, bonusy, dsq from zawodnik as z, przejazd as p" .
			" where (z.plec = 'K'  or z.plec = 'k') and z.idZawodnik = p.idZawodnika" .
			// " where (z.plec = 'K'  or z.plec = 'k') and z.idZawodnik = p.idZawodnika and p.nrPrzejazdu = 2" .
			// " order by idZawodnik asc, nrPrzejazdu asc";
			" order by nrPrzejazdu asc";

$res = just_query($query);
// print_r($res);


foreach ($res as $key => $r) {
	// print_r($r);
	// echo $r['bonusy'];
	// break;
	// $res[$key]['czas'] = str_replace(',','.',$r['czas']);
	$res[$key]['czasbon'] = $r['czas'] - $r['bonusy']*(0.6 - $r['nrPrzejazdu']*0.1);
	if ($res[$key]['dsq']) {
		$res[$key]['czas'] = 0;
		$res[$key]['czasbon'] = 0;
		$res[$key]['bonusy'] = 0;
	}
}

// for ($i=1; $i < 7; $i++) {
	
	
// }

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
	
	$czb = array_column($przejazd, 'czasbon'); 
	$nrp = array_column($przejazd, 'nrPrzejazdu'); 
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
		$f['Strata'] = ''; // $r[''];
		$f['Raw time'] = $r['czas'];
		$f['Bonusy'] = $r['bonusy'];
		$final[$j] = $f;
	}

	// $n = count($final);
	// $final[1] = $f;
	$ft = $final[1]['Total'];

	for (; $j > 1; $j--) {
		if ($final[$j]['Przejazdy'] == $final[1]['Przejazdy'])
			$final[$j]['Strata'] = '+' . ($final[$j]['Total'] - $ft);
	}



	$tabela .= make_html_table($final, "Przejazd $nr");
	
	
	
	
	
	
	
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
		  // ['category_id'=>$item['category_id'],'score'=>$item['score']]; 
    } else { 
        $carry[$item['idZawodnik']]['czas'] += $item['czas'];
		  $carry[$item['idZawodnik']]['czasbon'] += $item['czasbon']; 
		  $carry[$item['idZawodnik']]['bonusy'] += $item['bonusy'];
		  $carry[$item['idZawodnik']]['nrPrzejazdu'] += 1;
		  if ($item['dsq']) {
			  $carry[$item['idZawodnik']]['nrPrzejazdu'] -= 1;
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

for (; $i > 1; $i--) {
	if ($final[$i]['Przejazdy'] == $final[1]['Przejazdy'])
		$final[$i]['Strata'] = '+' . ($final[$i]['Total'] - $ft);
}



$tabela .= make_html_table($final, "Zawodnicy");

$debug = $tabela;

