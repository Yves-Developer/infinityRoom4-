<!DOCTYPE html>
<html>
<head>
	<title>Welcome To Yves DC</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="welc.css">
</head>
<body>
	
<?php
session_start();
if(!isset($_SESSION['uniq_id'])){
	header("location:./Login/index.php");
}
?>
	<!--Header -->
	<div class="header">
		<div class="logo">CH</div>
		<div class="Join-btn">About</div>
	</div><br><br><br>
	<br><br>
	<center>
	<div class="Bc01">
		<?php
		include_once "./PHP/config.php";
		$sql = mysqli_query($conn,"SELECT * FROM Reg_Log_info WHERE uniq_id = '{$_SESSION['uniq_id']}'");
		if(mysqli_num_rows($sql) > 0){
			$row = mysqli_fetch_assoc($sql);
		}
		?>
		<br><br>
		<center>
		<div class="Avat">
			<img src="./Login/avatar.png"">
		</div>			
		</center>
		<h2>Welcome.</h2><br>
		<p>Welcome to YvesDC<br><b><?php echo $row['usr_name']; ?></b></p>
		<br><br>
		<button><a href="./index.php" style="text-decoration:none;color:white">Continue</a></button>
	</div>
	</center>	<br><br><br><br>
</body>
</html>