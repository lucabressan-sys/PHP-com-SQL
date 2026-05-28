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
        }
        th {
            color:darkblue;
        }
        tbody > tr:nth-child(2n) {
            background-color:lightslategray;
            color:white;
        }
        table {
            min-width: 90vw;
        }
        a:visited {
            color: black;
        }
        a {
            color: black;
        }
        </style>
    </head>
    <body>
        <form action="" method="post">
            <label for="filter">Valor menor que: </label>
            <input type="text" name="value"> <br/>
            <input type="submit" name="submit" id="submit">
        </form>
        <table cellspacing="0">
            <thead>
                <th>ID</th>
                <th>TÍTULO</th>
                <th>DESCRIÇÃO</th>
                <th>VALOR</th>
                <th>IMAGEM</th>
                <th>EDITAR</th>
                <th>EXCLUIR</th>
            </thead>
            <tbody> 
        <br>
            <?php 
                include("util.php");
                $conn = connect("bd_Luca_Cursos");
                $value = $_POST['value']; //Recebe os dados do POST
                if(empty($gender)) {
                    $varSQL = "SELECT * FROM curso"; //Filtra o SQL
                    $select =  $conn->prepare($varSQL);
                    $select -> execute();
                } else {
                    $varSQL = "SELECT * FROM curso WHERE valor <= :valor"; //Filtra o SQL
                    $select =  $conn->prepare($varSQL);
                    $select -> bindParam(":valor",$value);
                    $select -> execute();
                }
                
               

                while ($linha = $select -> fetch()) {
                    $id = $linha['id'];
                    $titulo = $linha['titulo'];
                    $desc = $linha['descricao'];
                    $valor = $linha['valor'];
                    echo "<tr><td>" . $id . "</td><td>" . $titulo . "</td><td>" . $desc . "</td><td>" . $valor . "</td><td>" . "<img src='imagens/$id.png' height:40>" . "</td><td>" .
                    "<a href='alterarAlunos.php?id=". $id ."'><img src='icons/edit.png' alt='EDITAR'></a></td>" . "<td><a href='excluirAlunos.php?id=". $id ."'><img src='icons/delete-forever.png' alt='EXCLUIR'></a></td></tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <td colspan="7"><a href="adicionarAlunos.php" style="font-size: 20px;"><img src="icons/add.png" alt="ADICIONAR"></td>
            </tfoot>
        </table>
            
    </body>
</html>