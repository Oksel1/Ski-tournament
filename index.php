<?php 

// include 'menu.php';

$main = "
            <div id='licznik-tytul'>
                <h1> Do Pucharu Topora zostało: </h1>
                <div id='licznik'>
                    <script src='js/licznik.js'></script>
                </div>
            </div>
            
            <div class='przyciski'>
                <h1> Czy jesteś gotowy? </h1>
                <button class='przycisk' id='przyciskTak'> Tak! </button>
                <button class='przycisk' id='przyciskNie'> Nie... </button>
                <script src='js/runbtn.js'></script>
            </div>
";

include 'layout.php';