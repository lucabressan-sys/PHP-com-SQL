<?php 
    //------------------------------------------------------------
    //funcao que conecta ao banco de dados
    //maio/2026
    //------------------------------------------------------------
    
    function connect($dbname = "",$host = "localhost",$user="postgres",$password="postgres") {
        if ($dbname == "") {
            //Assume o default
            $params="pgsql:host=localhost;dbname=ecomm;user=postgres;password=postgres";
        } else {
            $params="pgsql:host=$host;dbname=$dbname;user=$user;password=$password";
        }
        try {
            $varConnect = new PDO($params);
            return $varConnect;
        } catch (Exception $error) {
            echo "Fudeu: " . $error->getMessage();
        }
    }
    // -----------------------------------------------------------
    // funcao que recebe imagem
    // maio/2026
    // -----------------------------------------------------------

    function salvaUpload($paramConn, $paramFiles, $paramCampo)
    {   
     // ISSET verifica se a variavel existe !!  
     //var_dump($paramFiles); 
     if ( isset( $paramFiles[$paramCampo] ) ) {
            // obtem o id do curso inserido
            $novoId   = $paramConn->lastInsertId();
            // obtem a extensão do arquivo
            $ext = pathinfo($paramFiles[$paramCampo]['name'], PATHINFO_EXTENSION);
            // cria o novo nome do arquivo
            // exemplo: /imagens/10.png
            $arquivoNovo = "imagens/$novoId.$ext";
            try {
               if (move_uploaded_file($paramFiles[$paramCampo]['tmp_name'], 
                   $arquivoNovo)) {
                   echo "<br>Arquivo $arquivoNovo criado com sucesso.\n";
               } 
            } catch (PDOException $e) { // se der erro ...
               echo "Erro, verifique o arquivo se a pasta imagens existe";
            }     
        }
    }
?>