<!DOCTYPE html>
<html lang="pl-PL">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles-menu.css">
  <link rel="stylesheet" href="../styles-przyciski-plec.css">
  <link rel="stylesheet" href="styles-table.css">
  <title>Puchar Topora</title>
  <style>
    header {
      position: fixed; 
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      text-align: center;
      z-index: 1000;
    }
    body {
      margin: 0;
      margin-top: 350px;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-image: linear-gradient(to right, #162ba4, #3498db, #162ba4);
      background-position: 100%;
    }

    .main-container {
      position: relative;
      padding: 20px;
      background: rgba(244, 228, 228, 0.532); /* main divs color */
      border-radius: 20px;
      backdrop-filter: blur(10px); 
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
      width: 900px;
      height: 1200px;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

  </style>

</head>
<body>
  <header id="menuContainer">
    <div id="logo-banner">

    </div>
    <nav>
        <ul>
            <li><a href="../index.html">START</a></li>
            <li><a href="opis/Opis.html">OPIS</a></li>
            <li><a href="">HISTORIA</a></li>
            <li><a href="Live.html">LIVE</a></li>
            <li><a href="">GALERIA ZDJ</a></li>
            <li><a href="">KONTAKT</a></li>
        </ul>
    </nav>
  </header> 
  <div class="main-container">

    <div id="statystyki">
      <p>Najlepszy czas wsrod kobiet: </p>
      <p>Najlepszy czas wsrod mezczyzn: </p>
      <p>Najwi臋ksza liczba zdobytych bonus贸w w艣r贸d kobiet: </p>
      <p>Najwi臋ksza liczba zdobytych bonus贸w w艣r贸d m臋偶czyzn: </p>
    </div>

    <div class="przyciski-plec">
      <button class="przycisk" id="kobiety" href="Live.php">Kobiety</button>
      <button class="przycisk" id="mezczyzni">M臋偶czy藕ni</button>
    </div>

    <div class="przycisk-total">
      <button id="total">Ranking og贸lny馃敶</button>
    </div> 

    <div class="przyciski-przejazdy">
	 <?php
			for ($i=1; $i < 7; ++$i) 
				echo "<button class='przycisk-run' id='przejazd-{$i}'>Przejazd {$i}</button>";

    
	 ?>
		</div>
<?php
    include "tabela.php";
?>



</div>

  <footer>

  </footer>
</body>
</html>