<?php

    include "util.php";
    $conn = connect("bd_Luca_Cursos");
    $varSQL =
    "INSERT INTO curso (titulo,descricao,valor)
     VALUES (:titulo,:descricao,:valor)";

    $insert = $conn->prepare($varSQL);
    $insert ->bindParam(':titulo', $_POST['title']);
    $insert ->bindParam(':descricao', $_POST['description']);
    $insert ->bindParam(':valor', $_POST['value']);
    $insert ->execute();

    if ( $insert ->execute() ) {
     salvaUpload($conn, $_FILES, 'arquivo');
    }
?>