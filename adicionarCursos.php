<html>
    <head>
        <meta charset="UTF-8">
        <title>ADICIONAR ALUNOS</title>
    </head>
    <body>
        <form action="insertCursos.php" method="POST" enctype="multipart/form-data">""
            <label for="title">Escreva o títlulo</label> <br>
            <input type="text" name="title" id="title"> <br>

            <label for="desciption">Escreva a descrição</label> <br>
            <input type="text" name="description" id="description"> <br>

            <label for="value">Insira o valor</label> <br>
            <input type="number" name="value" id="value"> <br>

            <label for="img">Insira uma imagem para seu curso</label> <br>
            <input type="file" name="img" id="img"> <br>

            <button type="submit">Enviar seu curso</button>
        </form>
    </body>
</html>