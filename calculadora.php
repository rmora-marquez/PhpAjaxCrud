<!DOCTYPE html>
<html>
    <head>
        <title>Calculadora php</title>
        <meta charset="UTF-8">
        
    </head>
    <body>
            <form  method="get" style="background-color: 
                   lightcyan;width: 300px; margin-left: 5px;padding: 10px">
                valor X: <br/>
                <input type="number" name="valorX" min="0" value="0" /><br/>
                valor Y: <br/>
                <input type="number" name="valorY" min="0" value="0" /><br/>
                <select name="op">
                    <option>+</option>
                    <option>-</option>
                    <option>*</option>
                    <option>/</option>
                </select>
                <input type="submit" value="calcular" />
            </form>            
            <?php
            if(isset($_GET["valorX"])){
                $valorX = $_GET["valorX"];
                $valorY = $_GET["valorY"];
                $op = $_GET["op"];
              //Agrege su codigo aqui
                
                
            }
            ?>
        </div>
    </body>
</html>
