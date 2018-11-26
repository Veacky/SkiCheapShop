<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SkiCheapShop</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  </head>
<body>

<div class = "jumbotron">
	<div class="inline"><h1><a href='?r=site/index'>SkiCheapShop</a></h1></div>
	<div class="login inline">
		<?php
		if(isset($_SESSION["user"])){
			echo $_SESSION["user"]->name;
			echo "<a href='?r=people/editing'>Edit profile</a>";
			echo "<a href='?r=people/logout'>Log out</a>";
		}
		else{
			echo "<a href='?r=people/login'>Log in</a>";
			echo "<a href='?r=people/signup'>Sign up</a>";
		}
		?>
	</div>
</div>

	<div class="top-site">
		<nav class = "navbar navbar-expand-md navbar-dark bg-danger sticky-top">
			<button class = "navbar-toggler"  data-toggle="collapse" data-target="#collapse_target">
				<span class = "navbar-toggler-icon"></span>
			</button>
			<div class = "collapse navbar-collapse" id= "collapse_target">
				<ul class = "navbar-nav">
					<li class = "nav-item"><a class ="nav-link" href="?r=item">All items</a></li>
					<li class = "nav-item"><a class ="nav-link" href="?r=category">Categories</a></li>
					<?php if(isset($_SESSION["user"])){ ?>
					<li class = "nav-item"> <a class ="nav-link"href="?r=item/additem">Add an item</a></li>
				<?php } ?>
				<?php if(isset($_SESSION["user"])){ ?>
				<li class = "nav-item"><a class ="nav-link" href="?r=people/view&id=<?php echo $_SESSION["user"]->idpeople; ?>">My selling items</a></li>
				<?php } ?>
				</ul>
			</div>
		</nav>
	</div>

<section>
	<div class="container"> <!-- Open div container for bootstrap -->

		<div class="message">
			<?php if(isset($_POST["error"])) { echo "<div class='alert alert-warning'>".$_POST["error"]."</div>"; }?>
			<?php if(isset($_POST["info"])) { echo "<div class='alert alert-info'>".$_POST["info"]."</div>"; }?>
	</div>
