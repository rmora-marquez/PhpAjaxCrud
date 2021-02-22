<?php

require 'database.php';

if(!empty($_POST)){
    
    $msg = '';
    $idalumno = $_POST['idalumno'];
    $nia =$_POST['nia'];
    $aPaterno =$_POST['aPaterno'];
    $aMaterno =$_POST['aMaterno'];
    $nombre =$_POST['nombre'];
    $curpA =$_POST['curpA'];
    $status =$_POST['status'];
    $ingreso =$_POST['ingreso'];
    // $idDomicilio =$_POST('idDomicilio');
    // $idCandidato =$_POST('idCandidato');    
    //$grupo =$_POST('grupo');
    
    $operacion = $_POST('operacion');
    
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
    if($operacion == 'insert'){
        $sql = "INSERT INTO alumno (NIA,aPaterno, aMaterno,nombre, curpA,status, ingreso,idDomicilio)"
                ." VALUES (?,?, ?,?, ?,?, ?,?)";
        
        $query = $pdo->prepare($sql);
        if($query->execute(array($nia,$aPaterno, $aMaterno,$nombre, $curpA,$status, $ingreso,$idDomicilio)) == false){
            $msg = 'Error: ' .$query->errorCode();
        }else{
            $msg = 'Alumno'. $aPaterno. ' '.$aMaterno.' '.$nombre .'creado ';
        }
    }elseif($operacion=='delete'){
        $idalumno = $_POST('idalumno');
        $sql = "DELETE FROM alumno WHERE idalumno = ?";
        $query = $pdo->prepare($sql);
        if($sql->execute(array($idalumno))==false){
            $msg = 'Error'. $query->errorCode();
        }else{
            $msg = 'Alumno eliminado';
        }
    }elseif($operacion =='update'){
        $sql = "UPDATE alumno SET (NIA=?,aPaterno=?, aMaterno=?,nombre=?, curpA=?,status=?, ingreso=?,idDomicilio=?) WHERE idalumno = ?";
        $query = $pdo->prepare($sql);        
        if($sql->execute(array($nia,$aPaterno, $aMaterno,$nombre, $curpA,$status, $ingreso,$idDomicilio,  intval($idalumno)))==FALSE){
            $msg ='Error: '.$query->errorCode();
        }  else {        
            $msg = 'alumno '. $aPaterno. ' '.$aMaterno.' '.$nombre .' actualizado';
        }
    }
    Database::disconnect();
    echo $msg;        
}
