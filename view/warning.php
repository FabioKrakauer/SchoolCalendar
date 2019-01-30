<?php 

$dir = realpath(__DIR__ . '/..');
require_once $dir.'/config/config.php';
require_once $dir.'/classes/DB.class.php';
require_once $dir.'/classes/Assigment.class.php';


include APP_ROOT . "/include/header.php";

$db = new DB();
$today = date("Y-m-d");
$day = date("Y-m-d", strtotime("+2 day"));
$danger_warn = $db->query("SELECT * FROM `assignment` WHERE `date_confirm` >= '$today' AND `date_confirm` <= '$day'");
$printed = [];
echo '<div class="container mt-3">';
echo '<h4 class="text-center mb-3">Urgentes</h4>';
while($foundDanger = $danger_warn->fetch()){
    $assigment = new Assigment($foundDanger["id"]);
    $printed[$assigment->getID()] = "true";
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>'.$assigment->getName().'</strong>
    <p class="d-inline">Para o dia: '.date("d/m/Y", strtotime($assigment->getDateConfirm())).'</p> ';
    ?>
    <form action="viewAssigment.php">
        <input type="hidden" name="tarefa" value="<?= $assigment->getID() ?>">
        <button type="submit" class="btn btn-danger"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></i> Detalhes</button>
    </form>
    </div>
<?php }
?>
    <h4 class="text-center mt-3 mb-3">Próximos</h4>
    <?php 

    $day = date("Y-m-d", strtotime("+7 day"));
    $safe_warn = $db->query("SELECT * FROM `assignment` WHERE `date_confirm` >= '$today' AND `date_confirm` <= '$day'");
    while($foundDanger = $safe_warn->fetch()){
        $assigment = new Assigment($foundDanger["id"]);
        if(!isset($printed[$assigment->getID()])){
            $printed[$assigment->getID()] = "true";
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>'.$assigment->getName().'</strong>
            <p class="d-inline">Para o dia: '.date("d/m/Y", strtotime($assigment->getDateConfirm())).'</p> ';
    ?>
    <form action="viewAssigment.php">
        <input type="hidden" name="tarefa" value="<?= $assigment->getID() ?>">
        <button type="submit" class="btn btn-warning"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></i> Detalhes</button>
    </form>
    </div>
<?php }
    }
?>
<h4 class="text-center mt-3 mb-3">Próximos 30 dias</h4>
    <?php 

    $day = date("Y-m-d", strtotime("+30 day"));
    $safe_warn = $db->query("SELECT * FROM `assignment` WHERE `date_confirm` >= '$today' AND `date_confirm` <= '$day'");
    while($foundDanger = $safe_warn->fetch()){
        $assigment = new Assigment($foundDanger["id"]);
        if(!isset($printed[$assigment->getID()])){
            $printed[$assigment->getID()] = "true";
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>'.$assigment->getName().'</strong>
            <p class="d-inline">Para o dia: '.date("d/m/Y", strtotime($assigment->getDateConfirm())).'</p> ';
    ?>
    <form action="viewAssigment.php">
        <input type="hidden" name="tarefa" value="<?= $assigment->getID() ?>">
        <button type="submit" class="btn btn-success"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></i> Detalhes</button>
    </form>
    </div>
<?php }
    }
?>
    </div>
    <?php include APP_ROOT . "/include/footer.php"; ?>