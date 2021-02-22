<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />        

        <script src="js/jquery-1.12.0.js" type="text/javascript"></script>        
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/dataList.js" type="text/javascript"></script>

        <title>Alumnos PHP AJAX CRUD</title>

    </head>
    <body>
        <div id="container">
            <div id="content">
                <h1>Content for form</h1>
            
            
                <div class="input-group" style="text-align: center" >
                    <button id="crearnuevo" class="btn btn-primary">
                        <i class="fa fa-plus">&nbsp;Crear alumno</i>
                    </button>                 
                </div>                                              
                <br/><br/>                        
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lista de alumnos</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <th>#</th>
                            <th>Id.</th>
                            <th>NIA</th>
                            <th>Apellido <br/>paterno</th>
                            <th>Apellido <br/>materno</th>
                            <th>Nombre(s)</th>
                            <th>CURP</th>
                            <th>Estado</th>
                            <th>Fecha de<br/> ingreso</th>
                            <th>Id. Domicilio</th>
                            <th colspan="2">Acciones</th>
                            </thead>
                            <tbody>
                                <?php
                                require_once 'php/database.php';
                                require_once 'php/paginacion.php';
                                $pdo = Database::connect();
//                                $sql = 'SELECT * FROM alumno';

                                $query = "SELECT * FROM alumno";
                                $records_per_page = 10;
                                $newquery = paging($query, $records_per_page);
                                dataview($newquery);
                                ?>
                                <!--                                $con = 1;
                                
                                                                foreach ($pdo->query($sql) as $row) {
                                                                    echo "<tr>";
                                                                    echo '<td>' . $con . '</td>';
                                                                    echo '<td>' . $row['idalumno'] . '</td>';
                                                                    echo '<td>' . $row['NIA'] . '</td>';
                                                                    echo '<td>' . $row['aPaterno'] . '</td>';
                                                                    echo '<td>' . $row['aMaterno'] . '</td>';
                                                                    echo '<td>' . $row['nombre'] . '</td>';
                                                                    echo '<td>' . $row['curpA'] . '</td>';
                                                                    echo '<td>' . $row['status'] . '</td>';
                                                                    echo '<td>' . $row['ingreso'] . '</td>';
                                                                    echo '<td>' . $row['idDomicilio'] . '</td>';
                                                                    echo '<td><button class="btn btn-primary" onclick="editar(' . $row['idalumno'] . ')"><i class="fa fa-pencil"></i>&nbsp;Editar</button></td>';
                                                                    echo '<td><button class="btn btn-primary" onclick="borrar(' . $row['idalumno'] . ')"><i class="fa fa-trash"></i>&nbsp;Eliminar</button></td>';
                                                                    echo "</tr>";
                                                                    $con++;
                                                                }-->

                                
                                <tr>
                                    <td colspan="11" align="center">
                                        <div class="pagination-wrap">
                                            <?php paginglink($query, $records_per_page); ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                            Database::disconnect();
                            ?>
                        </table>
                        <button class="btn btn-primary" onclick="editar( )"><i class="fa fa-pencil"></i>&nbsp;Editar</button>  
                        <button class="btn btn-primary" onclick="borrar( )"><i class="fa fa-trash"></i>&nbsp;Eliminar</button> 

                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>
