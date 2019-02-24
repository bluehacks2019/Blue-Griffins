<?php

require "dbconnection.php";
session_start();

/* ###### ADD TASK TO DATABASE ###### */
if(isset($_POST['submit-btn']))
{
	$firstword = $_POST["firstword1"];
	$secondword = $_POST["secondword1"];
	$star = $_POST["star1"];

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





	<!DOCTYPE html>
	<html>
	<head lang="en">
		<title>title</title>

		<link rel="stylesheet" href="star.css">
		<link rel="stylesheet" href="all.css">



		<!-- meta settings -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Riznel Baldazo, Karl Patrick Rodriguez, Dean Bayaca, Prince Domasig">

		<!-- Frameworks -->
	<!-- 	<link rel="stylesheet" type="text/css" href="css/w3.css?v=>"> -->
		<link rel="stylesheet" type="text/css" href="css/design.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" type="text/css" href="css/materialize.min.css?v=<?php echo time(); ?>">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
		<script src="js/jQuery.Keyframes-master/dist/jquery.keyframes.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<style type="text/css">


			@import url(http://fonts.googleapis.com/css?family=Comfortaa);
			input::-webkit-input-placeholder {
				color: white !important;
			}
		 
			input:-moz-placeholder { /* Firefox 18- */
				color: white !important;  
			}
		 
			input::-moz-placeholder {  /* Firefox 19+ */
				color: white !important;  
			}
		 
			input:-ms-input-placeholder {  
				color: white !important;  
			}
		
		</style>



</head>

<body  style="height:100%; background: #fe8c00;  /* fallback for old browsers */">

	<div id="page_day8" class="tasks_page" style="background: #fe8c00;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #f83600, #fe8c00);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #f83600, #fe8c00); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
		<!-- Heading (Navigation) -->
		<div class="tasks_nav" style="background: rgb(183,222,237); /* Old browsers */
background: -moz-linear-gradient(top, rgba(183,222,237,1) 0%, rgba(113,206,239,1) 50%, rgba(33,180,226,1) 51%, rgba(183,222,237,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(183,222,237,1) 0%,rgba(113,206,239,1) 50%,rgba(33,180,226,1) 51%,rgba(183,222,237,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(183,222,237,1) 0%,rgba(113,206,239,1) 50%,rgba(33,180,226,1) 51%,rgba(183,222,237,1) 100%);">
			<div id="day8_nav_left" class="tasks_nav_left" style="width:20px;">
				<i class="material-icons">arrow_backward</i>
							</div>
							<div style="font-family: 'comic sans ms';font-weight: bolder;font-size: 16px;color:#666666;z-index: 10; position: absolute; display: inline-block; padding-left: 35%;">RESULTS</div>
			<div class="float_clear"></div>

			<?php 
				$sql = "SELECT word, SUM(stars) FROM words GROUP BY word ORDER BY SUM(stars) DESC LIMIT 5";
				$result = $mysql_conn->query($sql);
				echo "<table>"; // start a table tag in the HTML
				echo "<tr><td style='text-align:right'>RANK</td><td>WORD</td></tr>";
				$counter = 1;
				while($row = $result->fetch_assoc())
				{   //Creates a loop to loop through 
					echo "<tr><td style='text-align:right;'>".$counter.". </td><td>".$row['word']."</td></tr>";  //$row['index'] the index here is a field name
					$counter++;		
				}

				echo "</table>"; //Close the table in HTML
			?>
		</div>
		<div style="position: fixed; bottom: 30px; z-index: 1; left: 27%;">
			<button class="btn btn-info"> <i class="fab fa-facebook-f"></i> Share Your Words</button>
		</div>
	</div>

	

	<div id="page_day2" class="tasks_page" style="background: #fe8c00;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #f83600, #fe8c00);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #f83600, #fe8c00); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
		<!-- Heading (Navigation) -->
		<div class="tasks_nav"style="background: rgb(183,222,237); /* Old browsers */
background: -moz-linear-gradient(top, rgba(183,222,237,1) 0%, rgba(113,206,239,1) 50%, rgba(33,180,226,1) 51%, rgba(183,222,237,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(183,222,237,1) 0%,rgba(113,206,239,1) 50%,rgba(33,180,226,1) 51%,rgba(183,222,237,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(183,222,237,1) 0%,rgba(113,206,239,1) 50%,rgba(33,180,226,1) 51%,rgba(183,222,237,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b7deed', endColorstr='#b7deed',GradientType=0 ); /* IE6-9 */; height: 4.6%;">
			<div id="day2_nav_left"  class="tasks_nav_left" style="width:20px; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
;">
				<i class="material-icons">arrow_backward</i>
			</div>
					<div style="font-family: 'comic sans ms';font-weight: bolder;font-size: 16px;color:#666666;z-index: 10; position: absolute; display: inline-block; padding-left: 35%;">DAY TWO</div>
				
			<div id="day2_nav_right"  class="tasks_nav_right" style="background-color: background: #D1913C;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFD194, #D1913C);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFD194, #D1913C);width:35px;height: 4.6% /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
;">
				<i class="material-icons">arrow_forward</i>
			</div>
			<div class="float_clear"></div>
			
			<form method="POST" id="d2tasks_here">
				<div class="form-group ">
					<div class="center-align">
						<br>
						<button type="button" class="btn btn-floating yellow pulse " id="d2add_task"><i class="material-icons">add</i></button>
					</div>
					<div class="row">

						<div class="input-field col s6 red-text">
							<input type = "text" name = "d2firstword1"  placeholder="Object" maxlength="16">
						</div>
						<div class="input-field col s6">

							<input type = "text" name = "d2secondword1"  placeholder="Purpose" maxlength="16">
						</div>
						<center>
							<div class="stars">
								<input class="star star-1" id="d2star-1" type="radio" name="d2star1" value="1"/>
								<label class="star star-1" for="d2star-1"></label>
								<input class="star star-2" id="d2star-2" type="radio" name="d2star1" value="2"/>
								<label class="star star-2" for="d2star-2"></label>
								<input class="star star-3" id="d2star-3" type="radio" name="d2star1" value="3"/>
								<label class="star star-3" for="d2star-3"></label>							
								<input class="star star-4" id="d2star-4" type="radio" name="d2star1" value="4"/>
								<label class="star star-4" for="d2star-4"></label>
								<input class="star star-5" id="d2star-5" type="radio" name="d2star1" value="5"/>
								<label class="star star-5" for="d2star-5"></label>
							</div>
						</center>
					</div>
					<hr>


				</div>


			</form>

<!-- 
					<br>
					<label for="firstword">Object</label>
					<input type = "text" id = "d2firstword1" name = "firstword1" class = "form-control" placeholder="" ><br>
					<label for="text">Purpose</label>
					<input type = "text" id = "d2secondword1" name = "secondword1" class = "form-control" placeholder="" ><br>

					<div class="stars">
						<input class="star star-1" id="d2star-1" type="radio" name="d2star1" value="1"/>
						<label class="star star-1" for="d2star-1"></label>
						<input class="star star-2" id="d2star-2" type="radio" name="d2star1" value="2"/>
						<label class="star star-2" for="d2star-2"></label>
						<input class="star star-3" id="d2star-3" type="radio" name="d2star1" value="3"/>
						<label class="star star-3" for="d2star-3"></label>							
						<input class="star star-4" id="d2star-4" type="radio" name="d2star1" value="4"/>
						<label class="star star-4" for="d2star-4"></label>
						<input class="star star-5" id="d2star-5" type="radio" name="d2star1" value="5"/>
						<label class="star star-5" for="d2star-5"></label>
					</div>


				</div>


			</form> -->
			<div class="row">
				<!-- <button type="button" id="d2add_task">add task</button> -->

				
				<center>
			<button type ="button" class="btn-floating btn-large waves-effect waves-light red" id="d2submit-btn" name = "submit-btn"><i class = "material-icons">event_available</i></button>
		</center>
			</div>

		</div>
	</div>

	<div id="page_day1" class="tasks_page" style="background: #fe8c00;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #f83600, #fe8c00);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #f83600, #fe8c00); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
		<!-- Heading (Navigation) -->
		<div class="tasks_nav black-text row" style="background: rgb(183,222,237); /* Old browsers */
background: -moz-linear-gradient(top, rgba(183,222,237,1) 0%, rgba(113,206,239,1) 50%, rgba(33,180,226,1) 51%, rgba(183,222,237,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(183,222,237,1) 0%,rgba(113,206,239,1) 50%,rgba(33,180,226,1) 51%,rgba(183,222,237,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(183,222,237,1) 0%,rgba(113,206,239,1) 50%,rgba(33,180,226,1) 51%,rgba(183,222,237,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b7deed', endColorstr='#b7deed',GradientType=0 ); /* IE6-9 */; height: 4.6%;">

			<div id="day1_nav_left"  class="tasks_nav_left" style="width:20px; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
;">
				<i class="material-icons">arrow_backward</i>
			</div>
					<div style="font-family: 'comic sans ms';font-weight: bolder;font-size: 16px;color:#666666;z-index: 10; position: absolute; display: inline-block; padding-left: 35%;">DAY ONE</div>
				
			<div id="day1_nav_right"  class="tasks_nav_right" style="background-color: background: #D1913C;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFD194, #D1913C);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFD194, #D1913C);width:35px;height: 4.6% /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
;">
				<i class="material-icons">arrow_forward</i>
			</div>
		</div>
	<div class="float_clear"></div>


	<form method="POST" id="tasks_here">
		<div class="form-group ">
			<div class="center-align">
				<br>
				<button type="button" class="btn btn-floating yellow pulse " id="add_task"><i class="material-icons">add</i></button>
			</div>
			<div class="row">

				<div class="input-field col s6 red-text">
					<input type = "text" id = "firstword1" name="firstword1" placeholder="Object" maxlength="16">
				</div>
				<div class="input-field col s6">

					<input type = "text" id = "secondword1" name="secondword1"  placeholder="Purpose" maxlength="16">
				</div>
				<center>
					<div class="stars">
						<input class="star star-1" id="star-1" type="radio" name="star1" value="1"/>
						<label class="star star-1" for="star-1"></label>
						<input class="star star-2" id="star-2" type="radio" name="star1" value="2"/>
						<label class="star star-2" for="star-2"></label>
						<input class="star star-3" id="star-3" type="radio" name="star1" value="3"/>
						<label class="star star-3" for="star-3"></label>							
						<input class="star star-4" id="star-4" type="radio" name="star1" value="4"/>
						<label class="star star-4" for="star-4"></label>
						<input class="star star-5" id="star-5" type="radio" name="star1" value="5"/>
						<label class="star star-5" for="star-5"></label>
					</div>
				</center>
			</div>
			<hr>


		</div>


	</form>
	<div class="row">
		<br>
		<center>
			<button type ="button" class="btn-floating btn-large waves-effect waves-light red" id="submit-btn" name = "submit-btn"><i class = "material-icons">event_available</i></button>
		</center>
	</div>


</div>
</div>









<script type="text/javascript">
	$(document).ready(function(){
		var i=1;
		function navTasksPages(loc_current, loc_redirect){
			var loc_current = loc_current;
			var loc_redirect = loc_redirect;
			console.log(loc_current);
			console.log(loc_redirect);
			var arr_percent;

			if(loc_current < loc_redirect){
				arr_percent = ['0%', '-100%', '100%', '0%'];
				$.keyframe.define([{
					name: 'anim_move_page_current_left',
					'from' : {left: arr_percent[0]},
					'to' : {left: arr_percent[1]}
				}]);

				$.keyframe.define([{
					name: 'anim_move_page_redirect_left',
					'from' : {left: arr_percent[2]},
					'to' : {left: arr_percent[3]}
				}]);
				$('#page_day'+loc_current).css({'animation':'anim_move_page_current_left 1s','animation-fill-mode':'both'});
				$('#page_day'+loc_redirect).css({'animation':'anim_move_page_redirect_left 1s','animation-fill-mode':'both'});
			} else if(loc_current > loc_redirect){
				arr_percent = ['0%', '-100%', '100%', '0%'];
				$.keyframe.define([{
					name: 'anim_move_page_current_right',
					'from' : {right: arr_percent[0]},
					'to' : {right: arr_percent[1]}
				}]);

				$.keyframe.define([{
					name: 'anim_move_page_redirect_right',
					'from' : {right: arr_percent[2]},
					'to' : {right: arr_percent[3]}
				}]);
				$('#page_day'+loc_current).css({'animation':'anim_move_page_current_right 1s','animation-fill-mode':'both'});
				$('#page_day'+loc_redirect).css({'animation':'anim_move_page_redirect_right 1s','animation-fill-mode':'both'});
			}

		}	
		$('#day1_nav_left').click(function(){
			location.replace('fpage.php');
		});			
		$('#day1_nav_right').click(function(){
			navTasksPages(1,2);
		});
		$('#day2_nav_right').click(function(){
			navTasksPages(2,8);
		});


		$('#day2_nav_left').click(function(){
			navTasksPages(2,1);
		});
		$('#day8_nav_left').click(function(){
			navTasksPages(8,2);
		});


		$("#add_task").click(function(){
			i++;
			$("#tasks_here").append('<div class="form-group" id="wholecon'+i+'"><div class="input-field col s6 red-text"><input type = "text" name = "firstword1" id = "firstword'+i+'" placeholder="Object" maxlength="16"></div><div class="input-field col s6"><input type = "text" name = "secondword1" id = "secondword'+i+'" placeholder="Purpose" maxlength="16"></div><center><div class="stars"><input class="star star-1" id="star-'+i+i+i+'" type="radio" name="star'+i+'" value="1"/><label class="star star-1" for="star-'+i+i+i+'"></label><input class="star star-2" id="star-'+i+i+i+i+'" type="radio" name="star'+i+'" value="2"/><label class="star star-2" for="star-'+i+i+i+i+'"></label><input class="star star-3" id="star-'+i+i+i+i+i+'" type="radio" name="star'+i+'" value="3"/><label class="star star-3" for="star-'+i+i+i+i+i+'"></label><input class="star star-4" id="star-'+i+i+i+i+i+i+'" type="radio" name="star'+i+'" value="4"/><label class="star star-4" for="star-'+i+i+i+i+i+i+'"></label><input class="star star-5" id="star-'+i+i+i+i+i+i+i+'" type="radio" name="star'+i+'" value="5"/><label class="star star-5" for="star-'+i+i+i+i+i+i+i+'"></label></div></center><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Delete</button>');
				//alert(i);
			});
		$(document).on('click', '.btn_remove', function(){ 
			var button_id = $(this).attr("id");   
			$('#wholecon'+button_id+'').remove();  
		}); 

		$("#submit-btn").click(function(){
			for (var x = 1; x <= i; x++) {
				var firstword   = $("#firstword"+x).val();
				var secondword  = $("#secondword"+x).val();
				var star = $("input[name=star"+x+"]:checked").val();
    				// alert(firstword);
    				switch (star) {
    					case '4':
    					star = '2';
    					break;
    					case '5':
    					star = '1';
    					break;
    					case '2':
    					star = '4';
    					break;
    					case '1':
    					star = '5';
    					break;
    				}
    				//alert(star);
    				$.post("db_ajax.php", {
    					'exec_ajax'		: true,
    					'firstword'		: firstword,
    					'secondword'	: secondword,
    					'star'			: star
    				}, function(data, status) {
    					swal({
    						title: "Good job! Share it on Facebook?",
    						text: data,
    						icon: "success",
    						buttons: true,
  							dangerMode: true,
    					}).then((willShare)=> {
    						if (willShare) {
    							 swal("Thank you for sharing!", {
							      icon: "success",
							      button: "Share!",
							      dangerMode: true
							    });
    						}

    						else {
    							swal("Maybe next time!", {
							      icon: "success",
							    });
    						}
    					});
    				});
    			}
    			
    		});


		$("#d2add_task").click(function(){
			i++;
			$("#d2tasks_here").append('<div class="form-group" id="d2wholecond2'+i+'"><br><label for="firstword'+i+'">Object</label><input type = "text" id = "d2firstword'+i+'" class = "form-control" placeholder="" ><br><label for="text'+i+'">Purpose</label><input type = "text" id = "d2secondword'+i+'" class = "form-control" placeholder="" ><br><div class="stars"><input class="star star-1" id="d2star-'+i+i+i+'" type="radio" name="d2star'+i+'" value="1"/><label class="star star-1" for="d2star-'+i+i+i+'"></label><input class="star star-2" id="d2star-'+i+i+i+i+'" type="radio" name="d2star'+i+'" value="2"/><label class="star star-2" for="d2star-'+i+i+i+i+'"></label><input class="star star-3" id="d2star-'+i+i+i+i+i+'" type="radio" name="d2star'+i+'" value="3"/><label class="star star-3" for="d2star-'+i+i+i+i+i+'"></label><input class="star star-4" id="d2star-'+i+i+i+i+i+i+'" type="radio" name="d2star'+i+'" value="4"/><label class="star star-4" for="d2star-'+i+i+i+i+i+i+'"></label><input class="star star-5" id="d2star-'+i+i+i+i+i+i+i+'" type="radio" name="d2star'+i+'" value="5"/><label class="star star-5" for="d2star-'+i+i+i+i+i+i+i+'"></label></div><button type="button" name="d2remove" id="d2'+i+'" class="btn btn-danger btn_remove">Delete</button>');

				//alert(i);
			});
		$(document).on('click', '.btn_remove', function(){ 
			var button_id = $(this).attr("id");   
			$('#d2wholecon'+button_id+'').remove();  
		}); 

		$("#d2submit-btn").click(function(){
			for (var x = 1; x <= i; x++) {
				var firstword   = $("#d2firstword"+x).val();
				var secondword  = $("#d2secondword"+x).val();
				var star = $("input[name=d2star"+x+"]:checked").val();
    				// alert(firstword);
    				switch (star) {
    					case '4':
    					star = '2';
    					break;
    					case '5':
    					star = '1';
    					break;
    					case '2':
    					star = '4';
    					break;
    					case '1':
    					star = '5';
    					break;
    				}
    				//alert(star);
    				$.post("db_ajax.php", {
    					'exec_ajax'		: true,
    					'firstword'		: firstword,
    					'secondword'	: secondword,
    					'star'			: star
    				}, function(data, status) {
    					swal({
    						title: "Good job!",
    						text: data,
    						icon: "success",
    					}).then(function(){
    						swal({
    							title: "Share it on Facebook?",
    							text: "We are excited!",
    							icon: "success",
    						});
    					});
    				});
    			}
    			
    		});



	});
</script>


</body>
</html>