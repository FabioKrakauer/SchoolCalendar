<?php

$dir = realpath(__DIR__ . '/..');
require_once $dir.'/config/config.php';
require_once $dir.'/classes/API.class.php';
require_once $dir.'/classes/Auth.class.php';

Auth::isLogged(true);   
include APP_ROOT . "/include/header.php";
if(!isset($_SESSION)){
    session_start();
}
?>

<div class="container mt-2">
    <h3 class="text-center mt-3">Cadastrar nova tarefa</h3>
    <?php
        if(isset($_SESSION["newAssigmentError"])){
            echo '<div class="alert alert-danger" role="alert">
                    <strong>'. $_SESSION["newAssigmentError"] . '</strong>
                  </div>';
        }
    ?>
    
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
                <textarea name="description" id="description" rows="5" placeholder="Descrição" class="form-control"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="description">Anexar arquivo</label>
                <input type="file" name="file" id="file" class="file-input-control" onchange="onChangeInput()">
                <label for="file" class="btn btn-outline-primary form-control mt-3" id="button-newFile">
                    <i class="fa fa-upload" aria-hidden="true"></i> <label for="file" id="label-File">Carregar arquivo</label>
                </label>
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