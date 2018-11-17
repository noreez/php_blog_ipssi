<?php
ob_start();
session_start();
require 'api/fonctions.php';
$bdd = bdd();
menu_navbar();

$limit = 5;
$query = "SELECT * FROM article";

$select = $bdd->prepare($query);
$select->execute();
$total_results = $select->rowCount();
$total_pages = ceil($total_results/$limit);

if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}



$starting_limit = ($page-1)*$limit;
$show  = "SELECT * FROM article ORDER BY id ASC LIMIT $starting_limit, $limit";

$data = $bdd->prepare($show);
$data->execute();

while($row = $data->fetch(PDO::FETCH_ASSOC)):
?>
<div class="card">
  <div class="card-header">
    <?php echo "Article de ".$row['author']; ?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['title']; ?></h5>
    <a href="see_article_comment.php?see_id=<?php echo $row['id']; ?> " target="_blank" class="btn btn-primary">See article and comments</a>
    <a href="add_commentary.php?add_comment=<?php echo $row['id']; ?> " target="_blank" class="btn btn-primary">Add comments</a>
  </div>
</div>
<hr>
<?php
endwhile;

for ($page=1; $page <= $total_pages ; $page++):?>

 <a href='<?php echo "?page=$page"; ?>' class="links" style="font-size:150%; margin-left:5%;"><?php  echo $page; ?> </a> 
<?php endfor; ?>


<html>
    <head>
        <meta charset="utf-8";/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title> Home Page </title>
    </head>
</html>