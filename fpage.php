<!DOCTYPE html>
<html>
<head lang="en">
	<title>Stride7</title>

<!-- meta settings -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Riznel Baldazo, Karl Patrick Rodriguez, Dean Bayaca, Prince Domasig">

<!-- Frameworks -->

	<link rel="stylesheet" type="text/css" href="css/design.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js?v=<?php echo time(); ?>"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



<style>
@import url(http://fonts.googleapis.com/css?family=Comfortaa);
	body {
		background: linear-gradient(rgb(284,54,0), rgb(254,140,0));
		background-repeat: no-repeat;
		background-size: auto;
		height: 100%;
		background-attachment: fixed;
	}
	button {
		width: 100%;
		margin-bottom: 10px;

	}
	#buttons_container {
		position: absolute;
		bottom: 0;
	}
	img {
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	  width: 100%;
	  height: 100%;
	}

	.btn {
		font-family: Comfortaa;
	}

	/*toggle style start*/
	.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
	/*toggle style end*/
</style>
<script>
$(document).ready(function(){
	$("#btn_start").click(function(){
		location.replace('tasks.php');
	});
});
</script>
</head>

<body>

<!-- Page  -->
	<div class="container">
		<div class="row justify-content-center">
		<img src="logo-Recovered.png">
			<div class="col-md-8 col-sm-12" align="center" id="buttons_container">
				<button class="btn btn-success" id="btn_start"><i class="fas fa-sign-in-alt"></i> Start</button>
				<button class="btn btn-primary"><i class="fas fa-chalkboard-teacher"></i> Tutorial</button>
				<button class="btn btn-info"> <i class="fab fa-facebook-f"></i> Share This App</button>
				<button class="btn btn-secondary" data-toggle="modal" data-target="#myModal"><i class="fas fa-cogs"></i> Settings</button>
			</div>
		</div>
	</div>

	<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><i class="fas fa-cogs"></i> Settings</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <table class="table table-borderless">
          	<tbody>
          		<tr>
          			<td>Notification</td>
          			<td><label class="switch">
					  <input type="checkbox">
					 	 <span class="slider round"></span>
						</label>
					</td>
          		</tr>
          	</tbody>
          </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Save and Close</button>
        </div>
        
      </div>
    </div>
  </div>

	
</body>
</html>