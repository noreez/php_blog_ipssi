<?php
ob_start(); 
require 'api/fonctions.php';
$bdd = bdd();
session_start();


if(isset($_POST['submit'])) {
    $errMsg = '';
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

      try {
        $stmt = $bdd->prepare('SELECT  * FROM user WHERE username = :username');
        $stmt->execute(array(
          ':username' => $username
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $validpassword = password_verify($password, $data['password']);

        if($data == false){
          $errMsg = "L'utilisateur $username n'a pas été trouvé.";
        }
          else if($validpassword == $data['password']) {
            $_SESSION['user'] = 1;
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            header("location:index.php");
            ob_end_flush();
            exit;
          }
          else
          $errMsg = 'Mot de passe incorrect.';
        
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
  }

?>


<html>
  <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <title> Login Page </title>
  </head>

  <body>
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <div class="fadeIn first">
        <img src="https://www.ecole-ipssi.com/wp-content/uploads/2017/01/logoIPSSI-1024x724.png" id="icon" alt="User Icon" />
        </div>

    <form action="login.php" method="post">
      <input type="text" class="fadeIn second" name="username" placeholder="username">
      <input type="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
    </form>

    <?php
    if(isset($errMsg)){
      echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
    }
    ?>

    <div id="formFooter">
      <a class="underlineHover" href="register.php">Register</a> </br>
      <a class="underlineHover" href="index.php">HomePage</a>
    </div>

    </div>
  </div>
  </body>
</html>
