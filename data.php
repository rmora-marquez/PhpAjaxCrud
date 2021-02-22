<?php

$operacion = '';
require_once 'php/database.php';

$msg = '';
$idalumno = '';
$nia = '';
$aPaterno = '';
$aMaterno = '';
$nombre = '';
$curpA = '';
$status = '1';
$ingreso = '';
$idDomicilio = '1';

if (!empty($_POST)) {
    $operacion = $_POST['operacion'];

    if ($operacion == 'update') {
        $pdo = Database::connect();
        $pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $idalumno = $_POST['idalumno'];

        $sql = "SELECT * FROM alumno WHERE idalumno = :idalumno";
        $stmt = $pdo->prepare($sql);
        $stmt->bindparam(":idalumno", $idalumno);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        $nia = $data['NIA'];
        $aPaterno = $data['aPaterno'];
        $aMaterno = $data['aMaterno'];
        $nombre = $data['nombre'];
        $curpA = $data['curpA'];
        $status = $data['status'];
        $ingreso = $data['ingreso'];
    }
}
?>
<link href="css/data.css" rel="stylesheet" type="text/css"/>
<script src="js/data.js" type="text/javascript"></script>
<div class="div_data" id="div_data">
    <form id="dataForm" class="form-horizontal" role="form" method="post" >
        <div id="alerta" class="alert alert-danger" role="alert"></div>
        <?php if ($operacion == 'update') {
            ?>
            <label for="idalumno">ID:</label>
            <div class="input-group" >
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input id="idalumno" name="idalumno" type="text" placeholder="ID" class="form-control" disabled="disabled" value="<?php echo $idalumno ?>"/>
            </div>
            <?php
        }
        ?>
        <label for="nia">NIA:</label>
        <div class="input-group" >
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input id="nia" name="nia" type="text" placeholder="NIA" class="form-control" required value="<?php echo $nia ?>"/>
        </div>    
        <label for="aPaterno">Apellido Paterno:</label>
        <div class="input-group" >
            <span class="input-group-addon"><i class="fa fa-font"></i></span>
            <input id="aPaterno" name="aPaterno" type="text" placeholder="Apellido paterno" class="form-control" required value="<?php echo $aPaterno ?>"/>
        </div>    
        <label for="aMaterno">Apellido Materno:</label>
        <div class="input-group" >
            <span class="input-group-addon"><i class="fa fa-fonticons"></i></span>
            <input id="aMaterno" name="aMaterno" type="text" placeholder="Apellido materno" class="form-control" required value="<?php echo $aMaterno ?>"/>
        </div>
        <label for="aMaterno">Nombre:</label>
        <div class="input-group" >
            <span class="input-group-addon"><i class="fa fa-font"></i></span>
            <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control" required value="<?php echo $nombre ?>"/>
        </div>
        <label for="curpA">CURP:</label>
        <div class="input-group" >
            <span class="input-group-addon"><i class="fa fa-bookmark"></i></span></span>
            <input id="curpA" name="curpA" type="text" placeholder="CURP" class="form-control" required value="<?php echo $curpA ?>"/>
        </div>
        <label for="status">Estado:</label>
        <div class="input-group" >
            <span class="input-group-addon"><i class="fa fa-exclamation"></i></span>
            <input id="status" name="status" type="text" placeholder="status" class="form-control" readonly value="<?php echo $status ?>"/>
        </div>
        <label for="ingreso">Ingreso:</label>
        <div class="input-group" >
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input id="ingreso" name="ingreso" type="date" placeholder="Fecha de ingreso dd/mm/aaaa" class="form-control" value="<?php echo $ingreso ?>"/>
        </div>
        <label for="idDomicilio">Domicilio:</label>
        <div class="input-group" >
            <span class="input-group-addon"><i class="fa fa-building"></i></span>
            <input id="idDomicilio" name="idDomicilio" type="text"  class="form-control" readonly value="<?php echo $idDomicilio ?>"/>
        </div>
        <div class="clearfix"></div>
        <button type="submit"  class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>               
    </form>
</div>
