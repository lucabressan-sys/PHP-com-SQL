<?php 
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

?>