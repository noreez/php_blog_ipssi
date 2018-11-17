<?php

require_once "api/fonctions.php";
session_start();
$bdd = bdd();
verifCoUser();
menu_navbar();

if(isset($_REQUEST['see_id']))
{
	try
	{
		$id = $_REQUEST['see_id']; 
		$select = $bdd->prepare('SELECT * FROM article WHERE id =:id'); 
		$select->bindParam(':id',$id);
		$select->execute(); 
        $row = $select->fetch(PDO::FETCH_ASSOC);
        
        
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	
}

?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
            <title>My Article</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <script src="js/jquery-1.12.4-jquery.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
        </head>

	    <body>
	

        <?php
            $select=$bdd->prepare("SELECT * FROM article WHERE id=:id");
            $select->bindParam(':id',$id);
            $select->execute();
            while($row=$select->fetch(PDO::FETCH_ASSOC))
            {
            ?>
            <center>
            <h1> <?php echo $row['title']; ?> </h1>
            </br>
            <h3> <?php echo "Article de ".$row['author']; ?> </h3>
            </br>
            <img src="upload/<?php echo $row['image']; ?>" width="50%" ></td> 
            </center>
            </br>
        
            <div align="justify"> <?php echo $row['content']; ?> </div>
            <?php
            }
            ?>
        </body>
    </html>