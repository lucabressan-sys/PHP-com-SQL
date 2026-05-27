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
        tbody > tr:nth-child(2n) {
            background-color:lightslategray;
            color:white;
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
            <label for="filter">Sexo: </label>
            <input type="text" name="gender"> <br/>
            <input type="submit" name="submit" id="submit">
        </form>
        <table cellspacing="0">
            <thead>
                <th>ID</th>
                <th>NOME</th>
                <th>DATA DE NASCIMENTO</th>
                <th>GÊNERO</th>
                <th>TURMA</th>
                <th>EDITAR</th>
                <th>EXCLUIR</th>
            </thead>
            <tbody> 
        <br>
            <?php 
                include("util.php");
                $conn = connect("bd_Luca_Cursos");
                $gender = $_POST['gender']; //Recebe os dados do POST
                if(empty($gender)) {
                    $varSQL = "SELECT * FROM aluno"; //Filtra o SQL
                    $select =  $conn->prepare($varSQL);
                    $select -> execute();
                } else {
                    $varSQL = "SELECT * FROM aluno WHERE genero = :genero"; //Filtra o SQL
                    $select =  $conn->prepare($varSQL);
                    $select -> bindParam(":genero",$gender);
                    $select -> execute();
                }
                
               

                while ($linha = $select -> fetch()) {
                    $id = $linha['id'];
                    $nome = $linha['nome'];
                    $dataNascimento = $linha['data_nasc'];
                    $sexo = $linha['genero'];
                    $turma = $linha['turma'];
                    echo "<tr><td>" . $id . "</td><td>" . $nome . "</td><td>" . $dataNascimento . "</td><td>" . $sexo . "</td><td>" . $turma . "</td><td>" .
                    "<a href='alterarAlunos.php?id=". $id ."'>ALTERAR</a></td>" . "<td><a href='excluirAlunos.php?id=". $id ."'>EXCLUIR</a></td></tr>";
                }
                ?>
            </tbody>
        </table>
            <a href="adicionarAlunos.php">ADICIONAR REGISTRO</a>
    </body>
</html>