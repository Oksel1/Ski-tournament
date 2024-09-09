<?php

if (!isset($form))
	$form = "
		
		<form action='run.php' method='POST' onsubmit='conf();'>

			<h2><label for='nr'>Zawodnik nr: {$fc[1]} </label></h2>			
			<h2><label for='name'>Name: {$fc[2]}</label></h2>
			<fieldset>
				<legend>Change order</legend>
				<input type='submit' name='action' value='Next'>
				<input type='submit' name='action' value='Last'>
			</fieldset>
			<fieldset>
				<legend>Result</legend>
					<label for='czas'>Czas: </label><br>
					<input type='number' id='czas' name='czas' min='0' step='0.01' placeholder='0.00' value='10.00' autofocus required>
					<br>
					<label for='bonus'>Bonusy: </label><br>
					<input type='number' id='bonus' name='bonus' min='0' value='0' required>
					<input type='submit' name='action' value='OK'>
			</fieldset>
			<fieldset>
				<legend>Dyskwalifikacja</legend>
					<label for='opis'>Powód dyskwalifikacji: </label><br>
					<input type='text' name='opis' placeholder='type reason or leave empty'>
					<input type='submit' name='action' value='DSQ'><br>
			</fieldset>
		</form> 
	";

// <input type='number' name='idz' value='{$fc[1]}' style='display:None;'>

if (!isset($debug)) {
	$debug = '';
}

if (!isset($res)) {
	$res = 'No res';
}


?>

<!DOCTYPE html>
<html lang="pl-PL">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Puchar Topora - Panel operatora </title>

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/po_main.css">
	<link rel="stylesheet" href="css/styles-table.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script>
		function conf(){
			//return confirm('Are you sure you want to submit?');
		}
	</script>

</head>


<body>

    <header>
        <h1><?php echo "Run {$fc[0]} - {$fc[3]}"; ?></h1>
    </header> 
    
    <div id="middle">
        
        <div id="left-mid" style="flex:30%">
			pending: <?php echo $pending; ?> <br>
        </div>
        
        <div id="main" style="flex:70%">
		  
			  <div id="main-up">
				running:	<?php echo $form; ?>
			  </div>
			  
			  <div id="main-down">
				finished: <?php echo $finished; ?> <br>
				</div>
        </div>

    </div>


    <footer>
		SESSION: <?php print_r($_SESSION); ?>
		COOKIE: <?php print_r($_COOKIE); ?>
		
    </footer>

    <div>
       
			debug:<br><?php echo $debug; ?> <br>
		   res: <?php print_r($res); ?> <br>
			running: <?php print_r($running); ?> <br>
			$_SErunning: 
			<?php if (isset($_SESSION['running'])) print_r($_SESSION['running']); else echo "unset"; ?> <br>
			stl: <?php print_r($stl); ?> <br>
			
    </div>


</body>
</html>