<?php

$host ="localhost";
$usuario = "root";
$senha = "";
$banco = "tcc_alexandre";

$conn = mysqli_connect($host, $usuario, $senha, $banco);

if(!$conn){
    die("Falha na conexao do banco". mysqli_connect_error());
}

?>