<?php require('./config.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Directory Database</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div id="container">
        <h1>Directory Database</h1>

        <div style="text-align: center">
            <br>
	<?php
	$i = 0;
	
	if ($handle = opendir($dir)) {
		while (($file = readdir($handle)) !== false){
			
			if (!in_array($file, array('.', '..')) && !is_dir($dir.$file))                             $i++;
		}

	}

	echo "<p>There is a total of $i files in the directory database</p>";
	
	if(isset($_GET['s']) and $_GET['s'] != '') {
		$search = $_GET['s'];
		$results = glob("$dir/*$search*$ext");
		
		if(count($results) != 1) {
			foreach($results as $item) {
				echo "<li><a href='$item'>$item</a></li>\r\n";
			}

		}

		
		if(count($results) == 1) {
			$item = $results[0];
			echo "<li color='blue'><a href='$item'>$item - only result</a></li>\r\n";
			echo "<a href=\"javascript:history.go(-1)\">New Search</a>";
		}

		
		if(count($results) == 0) {
			echo "<li>no results to display</li>\r\n";
			echo "<a href=\"javascript:history.go(-1)\">New Search</a>";
		}

	} else {
		?>
            <form action='' id="search" name="search">
                <input class="button" type="submit" value="Search">
                <input name='s'>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
