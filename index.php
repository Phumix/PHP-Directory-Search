<?php require('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Directory Database</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
<h2>Directory Search</h2>
<hr>    
<?php
$fi = new FilesystemIterator($dir, FilesystemIterator::SKIP_DOTS);
$fileCount = iterator_count($fi);
	echo "<p>There is a total of $fileCount files in the directory database</p>";
	if(isset($_GET['s']) and $_GET['s'] != '') {
		$search = $_GET['s'];
		$results = glob("$dir/*$search*$ext");
                
	        echo "<a href='.' class='btn btn-success btn-sm' role='button'>New Search</a>";
                echo "</br>";
                
                
		if(count($results) != 1) {
			foreach($results as $item) {
                        echo "<ul class='list-group'>";
                        echo "<a href='$item' class='list-group-item'>$item</a>";
			}

		}
		if(count($results) == 1) {
			$item = $results[0];
                        echo "<a href='$item' class='list-group-item'>$item</a>";
                        echo "</div>";
		}
		if(count($results) == 0) {
			echo "<div class='alert alert-danger' role='alert'>";
                        echo "<strong>No results found.</strong>";
                        echo "</div>";
		}

	} else {

            echo "<div class='form-group'>";
            echo "<form action='' id='search' name='search'>";
            echo "<input type='text' class='form-control' name='s'>";
            echo "<span class='input-group-btn'>";
            echo "<input class='btn btn-primary' type='submit' value='Search'>";
            echo "</form>";
            echo "</div>";
        }
?>     
</div>
</body>
</html>