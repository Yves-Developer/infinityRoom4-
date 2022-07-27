<!DOCTYPE html>
<html>
<head>
	<title>Chat to YvesDC</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo "<style>a{color:#fff;text-decoration:none;}
	.anch:hover{color:#fff;}
	</style>"; 
	?>
	<link rel="stylesheet" type="text/css" href="./GStyle.css">
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
		<div class="Join-btn"><a href="./Login/index.php">Exit</a></div>
	</div><br><br><br>
	<!-- main-->
	<div class="Main">
		<div class="Panel">
		<div class="group">Coder Zone</div>
		<div class="People">

			</div>
			</div>
		<div class="Chat" id="chat">
			<?php
			include_once "./PHP/config.php";
			$user_id = $_SESSION['uniq_id'];
			?>
			</p>

			<div class="messages">
							
			</div>
			<div class="TxTool">
				<form action="#" class="fom">
				<input type="text" name="outgoing_id" value="<?php echo $user_id;?>" hidden>
				<textarea name="msg" class="msg"></textarea>
				<input type="submit" value="Send" class="Send-btn">
			</form>
			</div>
		</div>
		</div>


<!-- Java Script Code:: blocks -->

	<script type="text/javascript" src="./main.js">	
	</script>
</body>
</html>