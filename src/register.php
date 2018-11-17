<?php
require 'api/fonctions.php';
$bdd = bdd();

if(isset($_POST['submit'])){
    $errMsg = '';

    
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $confirm = !empty($_POST['confirm']) ? trim($_POST['confirm']) : null;
    
    $sql = "SELECT COUNT(username) AS num FROM user WHERE username = :username";
    $stmt = $bdd->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if($row['num'] > 0){
        $errMsg = 'Username exist,please find a another username';
    }
    $password = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));

    if($_POST["password"] === $_POST["confirm"]){
    $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
    $stmt = $bdd->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
 
    $result = $stmt->execute();
  
    if($result){
        $errMsg = 'Thank you for registering. You can login ';
    }
    }  
    else{
      $errMsg = "Error because password and Confirm password is not the same";
    } 
}
 
?>


<html>
  <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <title> Register Page </title>
  </head>

  <body>
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <div class="fadeIn first">
          <img src="https://www.ecole-ipssi.com/wp-content/uploads/2017/01/logoIPSSI-1024x724.png" id="icon" alt="User Icon" />
        </div>
    
        <form action="register.php" method="post">
          <input type="text" class="fadeIn second" name="username" placeholder="username">
          <input type="password" class="fadeIn third" name="password" placeholder="password" minlength="6" maxlength="15">
          <input type="password" class="fadeIn third" name="confirm" placeholder="Confirm password" minlength="6" maxlength="15">
         <input type="submit" name="submit" class="fadeIn fourth" value="Register">
       </form>

      <?php
        if(isset($errMsg)){
          echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
      ?>

      <div id="formFooter">
        <a class="underlineHover" href="login.php">Login</a> </br>
        <a class="underlineHover" href="index.php">HomePage</a>
    </div>
  </div>
  </div>
  </body>
</html>
