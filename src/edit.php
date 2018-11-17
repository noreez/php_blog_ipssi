<?php
ob_start(); 
require_once "api/fonctions.php";
session_start();
$bdd = bdd();
verifCoUser();
form_deco();


if(isset($_REQUEST['update_id']))
{
	try
	{
		$id = $_REQUEST['update_id']; 
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

if(isset($_REQUEST['btn_update']))
{
	try
	{
		$title	= $_REQUEST['title'];
		$content	= $_REQUEST['content'];		
		$image_file	= $_FILES["image"]["name"];
		$type		= $_FILES["image"]["type"];	
		$size		= $_FILES["image"]["size"];
		$temp		= $_FILES["image"]["tmp_name"];

		$author	= $_REQUEST['author'];
					
		$directory="upload/"; 
		
		if($image_file)
		{
			if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') 
			{	
					if($size < 5000000) 
					{
						move_uploaded_file($temp, "upload/" .$image_file);
					}
					else
					{
						$errorMsg="Your File To large Please Upload 5MB Size"; 
					}

			}
			else
			{
				$errorMsg="Upload JPG, JPEG, PNG & GIF File Formate..CHECK FILE EXTENSION"; 
			}
		}
		else
		{
			$image_file=$row['image']; 
		}
	
		if(!isset($errorMsg))
		{
			$update=$bdd->prepare('UPDATE article SET title=:title, content=:content, image=:image, author=:author WHERE id=:id'); //sql update query
			$update->bindParam(':title',$title);
			$update->bindParam(':content',$content);
			$update->bindParam(':image',$image_file);
			$update->bindParam(':author',$author);
			$update->bindParam(':id',$id);
			 
			if($update->execute())
			{
				$updateMsg="File Update Successfully...";
				header("refresh:2;personal.php");
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
			<title>Edit Page</title>
			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
			<script src="js/jquery-1.12.4-jquery.min.js"></script>
			<script src="bootstrap/js/bootstrap.min.js"></script>
		</head>

		<body>
			<h2> Edit </h2>
			<div class="wrapper">
				<div class="container">
					<div class="col-lg-12">
						<?php
							if(isset($errorMsg)){
						?>
            			<div class="alert alert-danger">
            				<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            			</div>
            			<?php
						}
						if(isset($updateMsg)){
						?>
						<div class="alert alert-success">
							<strong>UPDATE ! <?php echo $updateMsg; ?></strong>
						</div>
        				<?php
						}
						?>   
		
						<form method="post" class="form-horizontal" enctype="multipart/form-data">
								
							<div class="form-group">
							<label class="col-sm-3 control-label">Title</label>
							<div class="col-sm-6">
							<input type="text" name="title" class="form-control" required/>
							</div>
							</div>
							

							<div class="form-group">
							<label class="col-sm-3 control-label">Content</label>
							<div class="col-sm-6">
							<textarea type="text" name="content" class="form-control input-lg" rows="15" required></textarea>
							</div>
							</div>	
								
							<div class="form-group">
							<label class="col-sm-3 control-label">File</label>
							<div class="col-sm-6">
							<input type="file" name="image" class="form-control"/>
							</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-3 control-label">Author</label>
							<div class="col-sm-6">
							<input type="text" name="author" class="form-control" value="<?php echo $_SESSION['username'];?>" readonly/>
							</div>
							</div>
								
							<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9 m-t-15">
							<input type="submit"  name="btn_update" class="btn btn-primary" value="Update">
							<a href="personal.php" class="btn btn-danger">Cancel</a>
							</div>
							</div>
								
						</form>
					</div>
				</div>
			</div>									
	</body>
</html>