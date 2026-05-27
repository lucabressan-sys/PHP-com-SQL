<html>
    <head>
        <style>
            * {
                font-size: 40px;
                align-items: center;
            }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            min-width: 23vw;
            max-width: 23vw;
        }
        tbody > tr:nth-child(2n) {
            background-color:lightslategray;
            color:white;
        }
        </style>
    </head>
    <body>
        <form action="" method="post">
            <label for="filter">Valor maior que: </label>
            
            <input type="number" name="low-filter"> <br/>

            <label for="filter">Valor menor que: </label>
            <input type="number" name="high-filter"> <br/>
            <input type="submit" name="submit" id="submit">
        </form>
        <table cellspacing="0">
            <thead>
                <th>ID</th>
                <th>TITULO</th>
                <th>DESCRICAO</th>
                <th>VALOR</th>
                
            </thead>
            <tbody> 
    
            <?php 
                include("util.php");
                $conn = connect("bd_Luca_Cursos");

                $valueFilterLowest = $_POST['low-filter']; //Recebe os dados do POST
                $valueFilterHighest = $_POST['high-filter'];
                echo "Maior que: " . $valueFilterLowest. "<br>Menor que: " . $valueFilterHighest;

                $varSQL = "SELECT * FROM cursos WHERE valor >= :valormin AND valor <= :valormax"; //Filtra o SQL
                $select =  $conn->prepare($varSQL);
                $select -> bindParam(":valormin",$valueFilterLowest);
                $select -> bindParam(":valormax",$valueFilterHighest);
                $select -> execute();

                while ($linha = $select -> fetch()) {
                    $id = $linha['id'];
                    $titulo = $linha['titulo'];
                    $desc = $linha['descricao'];
                    $valor = $linha['valor'];
                    echo "<tr><td>" . $id . "</td><td>" . $titulo . "</td><td>" . $desc . "</td><td>" . $valor . "</td>";
                }
                ?>
            </tbody>
        </table>
    </body>
</html>