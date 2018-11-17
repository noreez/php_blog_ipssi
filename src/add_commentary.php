<?php
ob_start();
require_once "api/fonctions.php";
session_start();
$bdd = bdd();
form_deco();

if(isset($_REQUEST['add_comment']))
{
	try
	{
		$id = $_REQUEST['add_comment']; 
		$select = $bdd->prepare('SELECT * FROM commentaire WHERE id =:id');
		$select->bindParam(':id',$id);
		$select->execute(); 
		$row = $select->fetch(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	
}

if(isset($_REQUEST['btn_insert']))
{
	try
	{
        $username	= $_REQUEST['username'];
        $content	= $_REQUEST['content'];

		
		if(!isset($errorMsg))
		{
			$insert=$bdd->prepare('INSERT INTO commentaire(username,content,article) VALUES(:username,:content,:article)'); 				
			$insert->bindParam(':username',$username);	
			$insert->bindParam(':content',$content);
			$insert->bindParam(':article',$id);	
		
			if($insert->execute())
			{
				$insertMsg="Comment add Successfully..."; 
				header("refresh:2;index.php"); 
				ob_end_flush();
			}
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title> Add comment </title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="js/jquery-1.12.4-jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	</head>

	<body>
		<h2> Add Comment </h2>
			<div class="wrapper">
				<div class="container">
					<div class="col-lg-12">
					<?php
					if(isset($errorMsg))
					{
					?>
            		<div class="alert alert-danger">
            			<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            		</div>
            		<?php
					}
					if(isset($insertMsg)){
					?>
					<div class="alert alert-success">
						<strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
					</div>
        			<?php
					}
					?>   
		
					<form method="post" class="form-horizontal" enctype="multipart/form-data">

						<div class="form-group">
						<label class="col-sm-3 control-label">Username</label>
						<div class="col-sm-6">
						<input type="text" name="username" class="form-control" placeholder="enter a username" />
						</div>
						</div>

						<div class="form-group">
						<label class="col-sm-3 control-label">Content</label>
						<div class="col-sm-6">
						<textarea type="text" name="content" class="form-control input-lg" placeholder="enter a content" rows="15" required></textarea>
						</div>
						</div>
							
						<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9 m-t-15">
						<input type="submit"  name="btn_insert" class="btn btn-success " value="Insert">
						<a href="index.php" class="btn btn-danger">Cancel</a>
						</div>
						</div>
					
					</form>
				</div>
			</div>		
		</div>									
	</body>
</html>