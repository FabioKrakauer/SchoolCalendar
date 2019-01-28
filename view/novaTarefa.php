<?php

$dir = realpath(__DIR__ . '/..');
require_once $dir.'/config/config.php';

include APP_ROOT . "/include/header.php";
?>

<div class="container mt-2">
    <h3 class="text-center mt-3">Cadastrar nova tarefa</h3>
    <form action="/calendario/controller/newAssigment.php" method="post">
        <div class="row">
            
        </div>
    </form>

</div>

<?php include APP_ROOT . "/include/footer.php";