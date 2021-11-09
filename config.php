<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "registro_login";

    $conn = mysqli_connect($server, $username, $password, $db);

    if(!$conn){
        die ("<script> alert('Falha na conexão com o banco de dados.') </script>");
    }
?>