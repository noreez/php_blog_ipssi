<?php

require_once "api/fonctions.php";
session_start();
$bdd = bdd();
verifCoUser();

if(isset($_REQUEST['btn_insert']))
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

		if(empty($title)){
			$errorMsg="Please Enter title";
		}
		else if(empty($image_file)){
			$errorMsg="Please Select image";
		}
		else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //check file extension
		{	

				if($size < 5000000) //check file size 5MB
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
			$errorMsg="Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; 
		}
		
		if(!isset($errorMsg))
		{
			$insert=$bdd->prepare('INSERT INTO article(title,content,image,author) VALUES(:title,:content,:image,:author)'); 					
			$insert->bindParam(':title',$title);	
			$insert->bindParam(':content',$content);
			$insert->bindParam(':image',$image_file);	  //bind all parameter 
			$insert->bindParam(':author',$author);
		
			if($insert->execute())
			{
				$insertMsg="File Upload Successfully..."; 
				header("refresh:2;personal.php"); 
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
		<title> Login Page</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="js/jquery-1.12.4-jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</head>

	<body>
		<h2> Add Article </h2>
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
				<label class="col-sm-3 control-label">Title</label>
				<div class="col-sm-6">
				<input type="text" name="title" class="form-control" placeholder="Enter a title" />
				</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label">Content</label>
				<div class="col-sm-6">
				<textarea type="text" name="content" class="form-control input-lg" placeholder="Enter a content" rows="15" required></textarea>
				</div>
				</div>
					
					
				<div class="form-group">
				<label class="col-sm-3 control-label">File</label>
				<div class="col-sm-6">
				<input type="file" name="image" class="form-control" />
				</div>
				</div>


				<div class="form-group">
				<label class="col-sm-3 control-label">Author</label>
				<div class="col-sm-6">
				<input type="text" name="author" class="form-control" value="<?php echo $_SESSION['username']?>" readonly />
				</div>
				</div>
					
					
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_insert" class="btn btn-success " value="Insert">
				<a href="personal.php" class="btn btn-danger">Cancel</a>
				</div>
				</div>
					
			</form>
			
			</div>		
			</div>			
		</div>									
	</body>
</html>