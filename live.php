<?php

require_once "make_tables.php";



$main = "
	<div id='przyciski' style='margin: 5% 0%;'>
    <div class='przyciski-plec'>
      <button class='przycisk' id='btn-k' onclick='chtab(\"k\",nrp);'>Kobiety</button>
      <button class='przycisk' id='btn-m' onclick='chtab(\"m\",nrp);'>Mężczyźni</button>
    </div>

    <div class='przyciski-przejazdy'>
		<button id='btnp-0' class='przycisk-run' onclick='chtab(sex,0);'> Ranking ogólny </button>
";

for ($i=1; $i < 7; ++$i) 
	$main .= "<button class='przycisk-run' id='btnp-{$i}' onclick='chtab(sex,$i);'>Przejazd {$i}</button>\n";


$dbname = 'axecup.db';

$rk = make_tables('k');
$rm = make_tables('m');
$main .= "</div>\n</div>\n<div id='tabele'>" . $rk[0] . $rm[0];

// $main .= "</div>\n
	// <div id='statystyki'>
      // <p>Najlepszy czas wsrod kobiet: {$rk[1]['brt']}</p>
      // <p>Najlepszy czas wsrod mezczyzn: {$rm[1]['brt']}</p>
      // <p>Najlepszy czas z bonifikata wsrod kobiet: {$rk[1]['bt']}</p>
      // <p>Najlepszy czas z bonifikata wsrod mezczyzn: {$rm[1]['bt']}</p>
		// <p>Największa liczba bonusów w przejezdzie wśród kobiet: {$rk[1]['mb']} </p>
      // <p>Największa liczba bonusów w przejezdzie wśród mężczyzn: {$rm[1]['mb']}</p>
		// <p>Największa liczba zdobytych bonusów wśród kobiet: {$rk[1]['tmb']} </p>
      // <p>Największa liczba zdobytych bonusów wśród mężczyzn: {$rm[1]['tmb']}</p>
    // </div>
// ";

$main .= "</div>\n
	<div id='statystyki-k'>
      <p>Najlepszy czas wsrod kobiet: {$rk[1]['brt']}</p>
		<p>Najlepszy czas z bonifikata wsrod kobiet: {$rk[1]['bt']}</p>
      <p>Największa liczba bonusów w przejezdzie wśród kobiet: {$rk[1]['mb']} </p>
      <p>Największa liczba zdobytych bonusów wśród kobiet: {$rk[1]['tmb']} </p>
	</div>
	<div id='statystyki-m'>
		<p>Najlepszy czas wsrod mezczyzn: {$rm[1]['brt']}</p>
      <p>Najlepszy czas z bonifikata wsrod mezczyzn: {$rm[1]['bt']}</p>
		<p>Największa liczba bonusów w przejezdzie wśród mężczyzn: {$rm[1]['mb']}</p>
		<p>Największa liczba zdobytych bonusów wśród mężczyzn: {$rm[1]['tmb']}</p>
    </div>
";


// $debug = $rk[1] . $rm[1];

include "layout.php";

?>