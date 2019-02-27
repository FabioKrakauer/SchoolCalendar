<?php

$dir = realpath(__DIR__ . '/..');
require_once $dir.'/config/config.php';
require_once $dir.'/classes/DB.class.php';
require_once $dir.'/classes/Assigment.class.php';
require_once $dir.'/classes/API.class.php';

include APP_ROOT . "/include/header.php";
?>

<h3 class="text-center">Pesquisar tarefas</h3>

<div class="container">
    <form action="search.php" method="post">
        <input type="hidden" name="show" value="true">
        <div class="row">
            <div class="form-group col-12 col-md-4">
                <label for="type">Selecione um tipo</label>
                <select name="category" class="form-control" id="category">
                    <option value="null">Selecione uma opção</option>
                    <?php 
                        foreach(API::categoryName() as $id=>$category){
                            echo '<option value="'.$id.'">'.$category.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="matter">Selecione uma matéria</label>
                <select name="matter" id="matter" class="form-control">
                <option value="null">Selecione uma opção</option>
                    <?php 
                        foreach(API::getMatters() as $id=>$matter){
                            echo '<option value="'.$id.'">'.$matter.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="date">Selecione uma data</label>
                <input type="date" name="date" class="form-control">
            </div>
            
        </div>
        <div class="container row">
            <button class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Pesquisar</button>
        </div>
    </form>

    <?php 
        if(isset($_POST["show"])){
            $query = "SELECT * FROM `assignment`";
            $whereIsset = false;
            $type = isset($_POST["category"]) ? $_POST["category"] : "null";
            $matter = isset($_POST["matter"]) ? $_POST["matter"] : "null";
            $date = $_POST["date"];
            if($date != ""){
                if(!$whereIsset){
                    $query .= " WHERE `date_confirm` = '$date'";
                    $whereIsset = true;
                }else{
                    $query .= " AND `date_confirm` = '$date'";
                }
            }
            if($type != "null"){
                if(!$whereIsset){
                    $query .= " WHERE `category` = '$type'";
                    $whereIsset = true;
                }else{
                    $query .= " AND `category` = '$type'";
                }
            }
            if($matter != "null"){
                if(!$whereIsset){
                    $query .= " WHERE `matter` = '$matter'";
                    $whereIsset = true;
                }else{
                    $query .= " AND `matter` = '$matter'";
                }
            }
            $db = new DB();
            $search = $db->query($query);
            ?>
            <div class="row container">
            <?php while($row = $search->fetch()){
                $assigment = new Assigment($row["id"]);
                $assigmentDay = strtotime($assigment->getDateConfirm());
                $today = strtotime(date("Y-m-d"));
                $tomorrow = strtotime("+1 day");
            ?>
            <div class="col-sm-12 col-md-4 mt-4">
            <div class="card">
                <?php
                 if($assigmentDay < $today){
                     echo '<div class="card-header bg-secondary text-white">';
                 }else if($assigmentDay == $today){
                     echo '<div class="card-header bg-danger text-white">';
                 }else if($assigmentDay > $today && $assigmentDay <= $tomorrow){
                     echo '<div class="card-header bg-warning">';
                 }else{
                    echo '<div class="card-header bg-success text-white">';
                 }
                 ?>
                    <?= $assigment->getName(); ?>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Para o dia: <?= date("d/m/Y", strtotime($assigment->getDateConfirm())) ?></h4>
                    <p class="card-text"><a href="/calendario/view/viewAssigment.php?tarefa=<?= $assigment->getID() ?>" class="btn btn-primary"><i class="fa fa-info-circle" aria-hidden="true"></i> Detalhes</a></p>
                </div>
            </div>
            </div>
        <?php }
        ?>
        </div>
        <!-- <h3 class="col-12">Legenda</h2> -->
        <div class="container mt-3">
            <label class="badge badge-secondary">Lições passadas</label>
            <label class="badge badge-danger">Lições de hoje</label>
            <label class="badge badge-warning">Lições de amanhã</label>
            <label class="badge badge-success">Próximas lições</label>
        </div>
        <?php }
    ?>

</div>
<?php  include APP_ROOT . "/include/footer.php"; ?>
