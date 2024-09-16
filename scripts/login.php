<?php

session_start();
include "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST["email"];   
    $senha = $_POST["senha"];
    $error="";

    if (empty($email)) { 
        $error.="2";
    }
    if(empty($senha)){ 
        $error.="3";
    }
    if($error){
        $error2= md5($error);
        header("Location: ../views/entrar.php?e=$error2"); 
        exit();

    }else{     
$senha2 = md5($senha);
$consulta = "SELECT * FROM Usuario WHERE Email= '$email' AND Senha = '$senha2'";
$resultado = mysqli_query($conn, $consulta);

if(mysqli_num_rows($resultado) == 1 ){

    $row = $resultado->fetch_assoc();
    $nivel = $row["Nivel"];
    $id = $row["IdUsuario"];
    $_SESSION["id_usuario"] = $id;
    $_SESSION["nivel_usuario"] = $nivel;

    if($nivel == 1){
        
        header("Location: ../index.php");
        exit();
       
    }else{
        header("Location: ../adm/index.php");
        exit();

    }   

        }else{
        header("Location: ../views/entrar.php?e=c4ca4238a0b923820dcc509a6f75849b");
        exit();

        }
    }
}else{ 
    header("Location: ../views/entrar.php?error=Não foram recebidos dados.");
    exit();
}

?>