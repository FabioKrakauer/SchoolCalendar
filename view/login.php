<!doctype html>
<html lang="en">
  <head>
    <title>Logar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
      <?php require_once '../classes/Auth.class.php';
      if(Auth::isLogged(false)){
          header("Location: /calendario");
      }else{
         ?>
        <div class="container">
          <?php
          if(isset($_GET["error"])){
              $message = $_GET["error"];
          ?>
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger col-md-6 col-sm-12">
                    <strong><?= $message ?></strong>
                </div>
            </div>
          <?php } ?>
            <h3 class="text-center">Logar</h3>
            <form action="login.php" method="post">
                <div class="row justify-content-center">
                    <div class="form-group col-md-6 col-sm-12 mt-3">
                        <label for="user">Digite seu nome</label>
                        <input type="text" name="user" id="user" class="form-control">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="pass">Digite sua senha</label>
                        <input type="password" name="pass" id="pass" class="form-control">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <input type="submit" class="btn btn-primary" value="Logar">
                </div>
            </form>
        </div>
        
<?php }
?>

<?php 
    if(isset($_POST["user"])){
        $result = Auth::validate($_POST["user"], md5($_POST["pass"]));
        if($result == -1){
            exit(header("Location: login.php?error=Email ou senha ínvalidos!"));
        }else{
            header("Location: /calendario/index.php");
        }
    }
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
