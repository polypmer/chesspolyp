<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>snail chess</title>
  <meta name="description" content="">
  <meta name="author" content="fenimore love">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="icon" type="img/png" href="img/favicon.png">

    <style>
      #splash {
        width: 100px;
        height: auto;
      }
      body {font-family:monospace;}
    </style>
</head>

<body>
    <div class="container">
    		<div class="row">
          <div class="one-half column">
            <h3>Chess Index</h3>
          </div>
          <div class="one-half column">
            <img id="splash" src="img/play.png" />
          </div>

    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="button button-primary">provocate</a>
				</p>

				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>info</th>
		                  <th>white</th>
		                  <th>black</th>
		                  <th>history</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM chessgames ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['info'] . '</td>';
							   	echo '<td>'. $row['white'] . '</td>';
							   	echo '<td>'. $row['black'] . '</td>';
                  echo '<td>'. $row['pgn'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="button button-primary" href="update.php?id='.$row['id'].'">load game</a>';
							   	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								echo '<br><br>';
							   	echo '<a class="button" href="delete.php?id='.$row['id'].'">remove</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
