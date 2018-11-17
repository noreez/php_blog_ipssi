<?php
ob_start();
session_start();
require 'api/fonctions.php';
$bdd = bdd();
verifCoUser();
menu_navbar();

$username = $_SESSION['username'];
	
	if(isset($_REQUEST['delete_id']))
	{

		$id=$_REQUEST['delete_id'];	
		
		$select_stmt= $bdd->prepare('SELECT * FROM article WHERE id =:id');	
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute();
		$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		
		$delete_stmt = $bdd->prepare('DELETE FROM article WHERE id =:id');
		$delete_stmt->bindParam(':id',$id);
		$delete_stmt->execute();
		
        header("Location:personal.php");
        ob_end_flush();
	}
	
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
        <title>My account</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="js/jquery-1.12.4-jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

		
</head>

	<body>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3><a href="add.php" target="_blank"><span class="glyphicon glyphicon-plus"></span>&nbsp; Add Article</a></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Author</th>
                                            <th>See</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$select_stmt=$bdd->prepare("SELECT * FROM user INNER JOIN article ON user.username = article.author WHERE article.author= '" . $username . "'");	//sql select query
									$select_stmt->execute();
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><img src="upload/<?php echo $row['image']; ?>" width="100px" height="60px"></td>
                                            <td><?php echo $row['author']; ?></td>
                                            <td><a href="show_article.php?see_id=<?php echo $row['id']; ?> " target="_blank" class="btn btn-warning">See</a></td>
                                            <td><a href="edit.php?update_id=<?php echo $row['id']; ?> " target="_blank" class="btn btn-warning">Edit</a></td>
                                            <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    <?php
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				
		</div>
		
	</div>
			
	</div>
									
	</body>
</html>
