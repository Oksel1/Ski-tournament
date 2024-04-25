<?php include "menu.php"; 

if (!isset($main)) {
	$main = 'Ups, no content yet!';
}

if (!isset($debug)) {
	$debug = 'No debug';
	
	// 
	// <li><a href="galeria.php">GALERIA&nbsp;ZDJĘĆ</a></li>
	
}

 
?>

<!DOCTYPE html>
<html lang="pl-PL">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Puchar Topora</title>

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/main.css">
	
	<link rel="stylesheet" href="css/middle.css">
	
	<link rel="stylesheet" href="css/styles-przyciski.css">
	
	<link rel="stylesheet" href="css/styles-table.css">

    

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script>
		var sex='k';
		var nrp=0;
		function chtab(s,n){
			
			sex=s;
			nrp=n;
			$("table").hide();
			$("[id^=statystyki]").hide();
			$("button").removeClass("active");
			$("#przejazd-"+s+"-"+n).show();
			$("#statystyki-"+sex).show();
			$("#btnp-"+nrp).addClass("active");
			$("#btn-"+sex).addClass("active");
		}		 
		$(document).ready(function(){chtab(sex,nrp)});
		// $(document).ready(function(){$("#kobiety").click(function(){chtab('k',nrp)});});
		// $(document).ready(function(){$("#mezczyzni").click(function(){chtab('m',nrp)});});
        
	</script>

</head>


<body>
    <!-- <div>
       <?php echo $debug; ?>

    </div> -->

    <header>

		<div id="logo-banner">
			<img src="pics/logo-top1.png" alt="Stalkant">
		</div>
        
    </header> 
    
   
	<nav>
        <ul>
            <li><a href="index.php">START</a></li>
            <li><a href="opis.php">OPIS</a></li>
            <li><a href="historia.php">HISTORIA</a></li>
            <li><a href="live.php">LIVE</a></li>
            <li><a href="galeria.php">GALERIA</a></li>
            <li><a href="kontakt.php">KONTAKT</a></li>
        </ul>
    </nav>

    <div id="middle">
        
        <div id="left-mid" style="flex:20%">
            <div id="koledzy">
                <!-- <h2> Lewa strona: </h2> -->
                <img src="pics/Julek-Topor.png" alt="Julek&Topor" style="width:90%">
            </div>
        </div>
        
        <div id="main" style="flex:60%">
            
            <?php echo $main; ?>
        
        </div>
        
        <div id="right-mid" style="flex:20%">
            <div id="patroni">
                <h2> Patroni medialni: </h2>
                <img src="pics/stalkant.png" alt="Stalkant">
                <img src="pics/apresski.png" alt="Apres Ski">
                <h2> Sponsorzy: </h2>
                <img src="pics/gigant.png" alt="Gigant Zakopane">
                <!-- <img src="pics/audu.png" alt="Audu">
                <img src="pics/dubeltowka.png" alt="Dubeltówka Czarna">
                <img src="pics/redboll.png" alt="Red Bóll"> -->
                <img src="pics/FUS.png" alt="FUS">
                <img src="pics/raceteam.png" alt="JuluskiRaceTeam">
            </div>
        </div>

    </div>


    <footer>
        <div id="content">
            <p>Znajdziesz nas też na:</p> 

            <div id="icons">
                <a href="https://www.facebook.com/events/2118367485198317" target="_blank">
                    <img src="pics/fb-logo.png" alt="Facebook">
                </a>
                <a href="https://open.spotify.com/playlist/68VCOiysbfT2j2nJzS2ZqZ?si=c3cb8e779be142c9" target="_blank">
                    <img src="pics/spotify-logo.png" alt="Spotify">
                </a>
                <a href="https://www.instagram.com/puchartopora/" target="_blank">
                    <img src="pics/ig-logo.png" alt="Instagram">
                </a>
            </div>
        </div>
    </footer>


</body>
</html>