<?php

$dir = realpath(__DIR__ . '/..');
require_once $dir.'/config/config.php';
require_once $dir.'/classes/API.class.php';
require_once $dir.'/classes/Auth.class.php';

Auth::isLogged(true);   
include APP_ROOT . "/include/header.php";
?>

<div class="container mt-2">
    <h3 class="text-center mt-3">Cadastrar nova tarefa</h3>
    <form action="/calendario/controller/newAssigment.php" method="post">
        <div class="row">
            <div class="form-group col-12 col-md-4">
                <label for="category">Selecione o tipo</label>
                <select name="category" class="form-control" id="category">
                    <?php 
                        foreach(API::categoryName() as $id=>$category){
                            echo '<option value="'.$id.'">'.$category.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="matter">Selecione a materia</label>
                <select name="matter" id="matter" class="form-control">
                    <?php 
                        foreach(API::getMatters() as $id=>$matter){
                            echo '<option value="'.$id.'">'.$matter.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="date">Selecionar data de entrega</label>
                <input type="date" name="date" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="description">Digite a descrição</label>
                <textarea name="description" id="description" cols="30" placeholder="Descrição" class="form-control"></textarea>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group col-12">
                <button type="submit" name="action" class="btn btn-success col-12" value="action"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> Cadastrar!</button>
            </div>
        </div>
    </form>

</div>

<?php include APP_ROOT . "/include/footer.php";