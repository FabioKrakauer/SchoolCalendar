<?php 

$dir = realpath(__DIR__ . '/');
require_once $dir.'/config/config.php';
require_once $dir.'/classes/DB.class.php';

include APP_ROOT . '/include/header.php';
?>
    <h3 class="text-center mt-4">Olá, o que deseja fazer?</h3>
    <div class="container text-center mt-4">
        <a href="/calendario/view/novaTarefa.php" class="btn btn-success">Nova tarefa</a>
        <a href="/calendario/view/search.php" class="btn btn-primary">Pesquisar tarefas</a>
        <a href="/calendario/view/warning.php" class="btn btn-danger text-white">Ver avisos</a>
    </div>
<?php
include APP_ROOT . '/include/footer.php'; ?>