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
	<link rel="stylesheet" href="<?php echo $css ?>backend.css" />
	
</head>
<body>
     <div class="upper-bar"> upper bar</div>
	<nav class="navbar "><!---navbar-inverse-->
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"  data-toggle="collapse" data-target="#app-nav"  aria-expanded="false">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"> Home page</a>
		</div>
		<div class="collapse navbar-collapse" id="app-nav">
			<ul class="nav navbar-nav-right">
						<?php
			foreach( getcat() as $cat){
					echo '<li><a="categories.php?pageid='. $cat['ID'].'">'
					. $cat['Name'] . ' 
					</a>
					</li>';
			}
			?>
				
				
			</ul>
		</div>
	</div>
	</nav>
