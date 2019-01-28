<?php 

$dir = realpath(__DIR__ . '/..');
require_once $dir.'/config/config.php';
require_once $dir.'/classes/API.class.php';
require_once $dir.'/classes/Assigment.class.php';

if(isset($_GET["tarefa"])){
    $assigment = new Assigment($_GET["tarefa"]);
    include APP_ROOT . "/include/header.php";
    ?>

<div class="container mt-2">
    <h3 class="text-center mt-3">Visualizando <?= $assigment->getName() ?></h3>
    <form action="/calendario/controller/newAssigment.php" method="post">
        <div class="row">
            <div class="form-group col-12 col-md-4">
                <label for="category">Tipo</label>
                <input type="text" name="matter" class="form-control" disabled value="<?= API::getCategoryByID($assigment->getCategory()) ?>">
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="matter">Materia</label>
                <input type="text" name="matter" class="form-control" disabled value="<?= API::getMatterByID($assigment->getMatter()) ?>">
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="date">Data de entrega</label>
                <input type="date" name="date" class="form-control" disabled value="<?= $assigment->getDateConfirm() ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="description">Descrição</label>
                <textarea name="description" disabled required id="description" cols="30" placeholder="Descrição" class="form-control"><?= $assigment->getDescription() ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
            <span class="badge badge-warning text-dark">Cadastrado dia: <?= date("d/m/Y", strtotime($assigment->getLancedDate())); ?></span>
            </div>
        </div>
    </form>
    </div>
<?php
}else{
    echo '<h3 class="text-center">Erro ao indentificar a tarefa!</h3>';
}
include APP_ROOT . "/include/footer.php";
?>