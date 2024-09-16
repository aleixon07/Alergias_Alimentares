<?php

session_start();
include "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$nivel = "1";
$error = "";

    if (empty($email)) { 
        $error.="2";
    }
    if(empty($senha)){ 
        $error.="3";
    }
    if(empty($nome)){ 
        $error.="4";
    }
    if($error){ 
        $error2 = md5($error);
        header("Location: ../views/entrar.php?e=$error2"); 
        exit();

    }else{     


        $sql_email = "SELECT * FROM usuario WHERE email = '$email'";
        $result_email = mysqli_query($conn,$sql_email);

        if(mysqli_num_rows($result_email) > 0){

            header("Location: ../views/entrar.php?e=1679091c5a880faf6fb5e6087eb1b2dc");
            exit();
        }

$senha2 = md5($senha);
$sql = "INSERT INTO usuario (Nome, Senha, Email, Nivel, Foto) VALUES ('$nome', '$senha2' , '$email', '$nivel', NULL)"; 

if($conn->query($sql)){

    $sql2 = "SELECT * FROM usuario WHERE email = '$email'";
    $result2 = mysqli_query($conn, $sql2);
    $row = $result2->fetch_assoc();

    $id = $row["IdUsuario"];
    $_SESSION["id_usuario"] = $id;
    $_SESSION["nivel_usuario"] = '1';

    header("Location: ../index.php?e=e4da3b7fbbce2345d7772b0674a318d5");
    exit();

}else{
    echo "erro ao cadastar usuasrio = ". $conn->error;
 }

    }

}else{
    header("Location: ../views/entrar.php");
    exit();
}
}else{ 
    header("Location: ../views/entrar.php");
    exit();
}
?>