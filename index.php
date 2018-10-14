<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Reader Writer</title>
  <link rel="stylesheet" 
  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
  crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
  crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type='text/javascript' src='./main.js'></script>
</head>
<body>
 
<?php
	if(!isset($_SESSION['process_name'])){
?>
<div style="margin: 20px;">
	<form method="POST" action="login.php">
	  <div class="form-group">
		<input class="from-control" name="process_name" type="text" placeholder="Enter Process Name">
		<button name="submit" class="btn btn-primary" type="submit">LOGIN</button>
	  </div>
	</form>
</div>
<?php
	}else{
?>
		<div class="container-fluid">
		  <div class="row">
			<div class="col">
				<button onclick="javascript: continous_request_lock('read');" class="btn btn-default">Read</button>
				<button onclick="javascript: continous_request_lock('write');" class="btn btn-default">Write</button>
				<button class="btn btn-default">Exit</button>
			<br>
			<br>
			<textarea name="" id="" cols="30" rows="10"></textarea>
			</div>
			<div class="col">
				<span>This Process Name</span>
				<span><?php echo $_SESSION['process_name']; ?></span>
			<br>
			<div>
				<span>
					<h4>Current Process in Critical Section</h4>
					<h3>{PROCESS_NAME}</h3>
				</span>
				<span>
					<h4>Operation</h4>
					<h3>{READ/WRITE}</h3>
				</span>
			</div>
		  </div>
		</div>
	</div>

		<div class="container-fluid">
		  <div class="row">
			<div class="col">
		  <h3>Reading Queue</h3>
		   <table class="table table-hover table-sm">
			  <tr>
				<th>No</th>
				<th>Process Name</th>
			  </tr>
			  <tr>
				<td>1</td>
				<td>Jill</td>
			  </tr>
			  <tr>
				<td>2</td>
				<td>Eve</td>
			  </tr>
			</table>
		</div>
		<br>
		<br>
		<div class="col">
		  <h3>Writing Queue</h3>
		   <table class="table table-hover table-sm">
			  <tr>
				<th>No</th>
				<th>Process Name</th>
			  </tr>
			  <tr>
				<td>1</td>
				<td>Jill</td>
			  </tr>
			  <tr>
				<td>2</td>
				<td>Eve</td>
			  </tr>
			</table>
		  </div>
			</div>
		</div>        
<?php        
	}
?>
  
</body>
</html>
