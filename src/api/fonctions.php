<?php
function bdd(){ // pour se connecter à la base de données (bdd)
	$where = 'test';
	$servername = "db";
	$username = "moi";
	$password = "password";
	if ($where == 'test') {
		try { $bdd = new PDO("mysql:host=$servername;dbname=adminer", $username, $password); }
		catch (Exeption $e) { die('Erreur : ' .$e->getMessage())  or die(print_r($bdd->errorInfo())); }
	}  else {
		echo "ERREUR";
	}
	return $bdd;
}

function verifCoUser(){
	if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {}
	else {
		header('Location:login.php');
	}
}

function form_deco() {
	echo "
		<form method='post' action='logout.php'>
				<input type='submit' value='Déconnexion' name='deco' class='waves-effect waves-light btn'/>
		</form>
	";
}


function menu_navbar(){
	if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
		echo "<nav class='black'>";
			echo"<div class='nav-wrapper'>";
				echo"<ul id='nav-mobile' class='right hide-on-med-and-down'>";
					echo" <li><a href='index.php' class='waves-effect waves-light btn'>Home Page</a></li>";
					echo" <li><a href='personal.php' class='waves-effect waves-light btn'>My Account</a></li>";
					echo" <li><a href='logout.php' class='waves-effect waves-light btn'>Logout</a></li>";
		 		echo"</ul>";
		  		echo"<h2> Hello ".$_SESSION['username'].", Welcome to the blog </h2>
			</div>
	 	</nav>";
		
	}
		else {
			 echo "<nav class='black'>
			 	<div class='nav-wrapper'>
		 			<ul id='nav-mobile' class='right hide-on-med-and-down'>
		   				<li><a href='index.php' class='waves-effect waves-light btn'>Home Page</a></li>
						<li><a href='login.php' class='waves-effect waves-light btn'>Sign in</a></li>
						<li><a href='register.php' class='waves-effect waves-light btn'>Sign up</a></li>
		 			</ul>
		  			<h4> Welcome to the blog </h4>
				</div>
	  		</nav>
	  		<br/>";			
		}
}