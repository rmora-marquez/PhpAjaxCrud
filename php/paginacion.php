<?php
require_once 'database.php';
/* paging */

    function dataview($query) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>                                               
                    <td><?php print($row['idalumno']); ?></td>
                    <td><?php print($row['NIA']); ?></td>
                    <td><?php print($row['aPaterno']); ?></td>
                    <td><?php print($row['aMaterno']); ?></td>
                    <td><?php print($row['nombre']); ?></td>
                    <td><?php print($row['curpA']); ?></td>
                    <td><?php print($row['status']); ?></td>
                    <td><?php print($row['ingreso']); ?></td>
                    <td><?php print($row['idDomicilio']); ?></td>
                    <td><button class="btn btn-primary" onclick="editar(<?php print($row['idalumno']);?> )"><i class="fa fa-pencil"></i>&nbsp;Editar</button>
                    </td>
                    <td><button class="btn btn-primary" onclick="borrar(<?php echo $row['idalumno']; ?>)"><i class="fa fa-trash"></i>&nbsp;Eliminar</button></td>
                    <td align="center">
                        <a href="edit-data.php?edit_id=<?php print($row['idalumno']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                    </td>
                    <td align="center">
                        <a href="delete.php?delete_id=<?php print($row['idalumno']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td>Sin datos...</td>
            </tr>
            <?php
        }
    }

    function paging($query, $records_per_page) {
        $starting_position = 0;
        if (isset($_GET["page_no"])) {
            $starting_position = ($_GET["page_no"] - 1) * $records_per_page;
        }
        $query2 = $query . " limit $starting_position,$records_per_page";
        return $query2;
    }

    function paginglink($query, $records_per_page) {

        $self = $_SERVER['PHP_SELF'];
        $pdo = Database::connect();
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $total_no_of_records = $stmt->rowCount();

        if ($total_no_of_records > 0) {
            ?><ul class="pagination"><?php
            $total_no_of_pages = ceil($total_no_of_records / $records_per_page);
            $current_page = 1;
            if (isset($_GET["page_no"])) {
                $current_page = $_GET["page_no"];
            }
            if ($current_page != 1) {
                $previous = $current_page - 1;
                echo "<li><a href='" . $self . "?page_no=1'>Primer</a></li>";
                echo "<li><a href='" . $self . "?page_no=" . $previous . "'>Previo</a></li>";
            }
            for ($i = 1; $i <= $total_no_of_pages; $i++) {
                if ($i == $current_page) {
                    echo "<li><a href='" . $self . "?page_no=" . $i . "' style='color:red;'>" . $i . "</a></li>";
                } else {
                    echo "<li><a href='" . $self . "?page_no=" . $i . "'>" . $i . "</a></li>";
                }
            }
            if ($current_page != $total_no_of_pages) {
                $next = $current_page + 1;
                echo "<li><a href='" . $self . "?page_no=" . $next . "'>Siguiente</a></li>";
                echo "<li><a href='" . $self . "?page_no=" . $total_no_of_pages . "'>Ultimo</a></li>";
            }
            ?></ul><?php
            }
        }

        /* paging */