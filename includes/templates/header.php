<!DOCTYPE html>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title><?php getTitle() ?></title>
	<link rel="stylesheet" href="<?php echo $css ?>bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo $css ?>font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo $css ?>jquery-ui.css" />
	<link rel="stylesheet" href="<?php echo $css ?>jquery.selectBoxIt.css" />
	<link rel="stylesheet" href="<?php echo $css ?>front.css" />

</head>
<body>
<div class="upper-bar">
    <div class="container">
		<?php 
		if(isset($_SESSION['user'])){
			echo 'Welcome' . $_SESSION['user'] ;
			echo '<a href ="profile.php">My Profile</a>';
			echo '<a href ="logout.php">Logout</a>';

		 $userStatus =checkUserStatus($_SESSION['user']);
			  if($userStatus == 1){
				  //user is not active
				 // echo 'Your Membership Need To Activiate By Admin';
			  }
				} else {

?>
			
	 <a href="login.php">
	 <span class="pull-right">Login/Signup</span>
	 </a>

	 <?php } ?>	 
</div>
</div>	 

</body>
