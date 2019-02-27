<?php
$dir = realpath(__DIR__ . '/..');
require_once $dir.'/config/config.php';
require_once $dir.'/classes/Auth.class.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/calendario"><i class="fa fa-calendar" aria-hidden="true"></i> Calendário</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php 
                    if(Auth::isLogged(false)){
                        echo '<li class="nav-item active">
                                <a class="nav-link" href="/calendario/view/novaTarefa.php"><i class="fa fa-book" aria-hidden="true"></i> Nova tarefa </a>
                            </li>';
                    }
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/calendario/view/search.php"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/calendario/view/warning.php"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Avisos</a>
                </li>
            </ul>
            <?php 
                if(!Auth::isLogged(false)){
            ?>
                <div class="ml-auto">
                    <a class="text-white" href="/calendario/view/login.php"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Logar</a>
                </div>
          <?php }else{
              $name = Auth::user();
              ?>
              <div class="dropdown ml-auto">
                <button class="btn text-white dropdown-toggle bg-dark" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Olá, <?php echo $name; ?>
                </button>
                <div class="dropdown-menu bg-light" aria-labelledby="dropdownMenu2">
                    <a href="/calendario/controller/logout.php" class="dropdown-item ">Sair</a>
                </div>
            </div>
          <?php } 
            ?>
        </div>
    </nav>
  </body>
</html>