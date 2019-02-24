<?php

	require "dbconnection.php";
	session_start();

	/* ###### ADD TASK TO DATABASE ###### */
	if(isset($_POST['submit-btn']))
	{
		$firstword = $_POST["firstword"];
		$secondword = $_POST["secondword"];
		$star = $_POST["star"];

		switch ($star){
			case "onestar":
				$stars = 1;
				break;
			case "twostar":
				$stars = 2;
				break;
			case "threestar":
				$stars = 3;
				break;
			case "fourstar":
				$stars = 4;
				break;
			case "fivestar":
				$stars = 5;
				break;
		}
		echo $stars;
		$sql = "INSERT INTO words(word,stars)";
		$sql = $sql."VALUES('$firstword', '$stars')";
		if($mysql_conn->query($sql))
		{
			//echo "<script>window.alert('YOU ADDED A TASK');</script>";
		}
		else
		{
			echo "<script>alert('AN ERROR OCCURED');</script>";
		}
		$sql = "INSERT INTO words(word,stars)";
		$sql = $sql."VALUES('$secondword', '$stars')";
		if($mysql_conn->query($sql))
		{
			//echo "<script>window.alert('YOU ADDED A TASK');</script>";
		}
		else
		{
			echo "<script>alert('AN ERROR OCCURED');</script>";
		}
	}

    /* ######## CHECK TOP 5 ###### */
	if(isset($_POST['checkrank-btn']))
	{
		$sql = "SELECT word, SUM(stars) FROM words GROUP BY word ORDER BY SUM(stars) DESC LIMIT 5";
		$result = $mysql_conn->query($sql);
		echo "<table>"; // start a table tag in the HTML
		echo "<tr><td>WORD</td><td>STARS</td></tr>";
		while($row = $result->fetch_assoc())
		{   //Creates a loop to loop through 
			echo "<tr><td>".$row['word']."</td><td>".$row['SUM(stars)']."</td></tr>";  //$row['index'] the index here is a field name		
		}

		echo "</table>"; //Close the table in HTML

	}

?>

<html>
<head>
	<title>Stride7 CRUD Module</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="star.css">
	<link rel="stylesheet" href="all.css">
</head>

<body>

				<!-- ####### ADD TASK TO DB ####### -->
				<form method="POST">
            		<div class="form-group">
            			<br>
                		<label for="firstword">FirstWord</label>
                		<input type = "text" name = "firstword" class = "form-control" placeholder="Enter First Word" required><br>
                		<br>
                		<label for="text">Second Word</label>
                		<input type = "text" name = "secondword" class = "form-control" placeholder="Enter Second Word" required><br>
                		<br>

                		<div class="stars">
							<input class="star star-5" id="star-5" type="radio" name="star" value="fivestar"/>
								<label class="star star-5" for="star-5"></label>
							<input class="star star-4" id="star-4" type="radio" name="star" value="fourstar"/>
								<label class="star star-4" for="star-4"></label>
							<input class="star star-3" id="star-3" type="radio" name="star" value="threestar"/>
								<label class="star star-3" for="star-3"></label>
							<input class="star star-2" id="star-2" type="radio" name="star" value="twostar"/>
								<label class="star star-2" for="star-2"></label>
							<input class="star star-1" id="star-1" type="radio" name="star" value="onestar"/>
								<label class="star star-1" for="star-1"></label>
						</div>

						
  						<br>
               			<input type = "submit" class="btn btn-primary" name = "submit-btn" value = " Submit "/>
            		</div>
           
        		</form>

        		<!-- ####### CHECK TOP 5 #######-->
        		<form method="POST">
        			<div class="form-group">
        			<input type = "submit" class="btn btn-primary" name = "checkrank-btn" value = " CHECK RANK "/>
            		</div>
           
        		</form>
</body>








</html>