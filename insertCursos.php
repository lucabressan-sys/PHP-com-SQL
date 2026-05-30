<html>
    <?php

        include "util.php";
        $conn = connect("db_php");
        $varSQL = "INSERT INTO curso (titulo,descricao,valor) VALUES (:titulo,:descricao,:valor)";

        $insert = $conn->prepare($varSQL);
        $insert ->bindParam(':titulo', $_POST['title']);
        $insert ->bindParam(':descricao', $_POST['description']);
        $insert ->bindParam(':valor', $_POST['value']);
        $execute = $insert ->execute();

        if ($execute) {
        salvaUpload($conn, $_FILES, 'arquivo');
        }
    ?>
    <a href="Cursos.php">Voltar a página inicial</a>
</html>
