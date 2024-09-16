<?php

session_start();
include "connection.php";

if(isset($_SESSION['id_usuario'])){

    $idusuario_session = $_SESSION["id_usuario"];

if($_SERVER["REQUEST_METHOD"] == "POST"){


if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["profissao"]) && isset($_POST["local_atendimento"]) && isset($_POST["horario_atendimento"]) && isset($_POST["telefone"]) && isset($_POST["preco"]) && isset($_POST["biografia"]) && isset($_POST["id_usuario"])){
$nome = $_POST["nome"];
$email = $_POST["email"];
$profissao = $_POST["profissao"];
$local_atendimento = $_POST["local_atendimento"];
$horario_atendimento = $_POST["horario_atendimento"];
$telefone = $_POST["telefone"];
$preco = $_POST["preco"];
$biografia = $_POST["biografia"];
$id_usuario = $_POST["id_usuario"];
$error = "";

$sql_email = "SELECT * FROM profissionais WHERE Email = '$email'";
$result_email = mysqli_query($conn,$sql_email);

if(mysqli_num_rows($result_email) > 0){

    if(isset($_POST['a'])){

        header("Location: ../views/profissionais.php?e=d2ddea18f00665ce8623e36bd4e3c7c5");
        exit();
    }else{

        header("Location: ../adm/index.php?e=d2ddea18f00665ce8623e36bd4e3c7c5");
        exit();
    }
}

$sql_telefone = "SELECT * FROM profissionais WHERE Telefone = '$telefone'";
$result_telefone = mysqli_query($conn,$sql_telefone);

if(mysqli_num_rows($result_telefone) > 0){

    if(isset($_POST['a'])){

        header("Location: ../views/profissionais.php?e=ad61ab143223efbc24c7d2583be69251");
        exit();
    }else{

        header("Location: ../adm/index.php?e=ad61ab143223efbc24c7d2583be69251");
        exit();
    }
}

$diretorioDestino = "../fotos/profissionais/";
    
        // Obtém informações sobre o arquivo
        $imagem = $_FILES["imagem"];
        $nomeimagem = uniqid($imagem["name"]).".jpeg";
        $tipo = $imagem["type"];
        $tamanho = $imagem["size"];
        $tmp_name = $imagem["tmp_name"];
    
        // Move o arquivo para o diretório de destino
        $caminhoDestino = $diretorioDestino .$nomeimagem;
        if (move_uploaded_file($tmp_name, $caminhoDestino)) {
            echo "Imagem enviada com sucesso!";
        } else {
            echo "Erro ao enviar a imagem.";
        }

    if (empty($nome) || empty($email) || empty($profissao) || empty($local_atendimento) || empty($horario_atendimento) ||  empty($telefone) || empty($preco) || empty($biografia)){ 
        $error ="41";
    }
    if($error){ 
        $error2= md5($error);
        header("Location: ../adm/index.php?e=$error2"); 
        exit();

    }else{     

if(isset($_POST['a'])){
    $sql = "INSERT INTO profissionais (Nome, Profissao, Local_Atendimento, 
Horario_Atendimento, Email, Telefone, Biografia, Precos, Foto, IdUsuario, Oculta) VALUES 
('$nome','$profissao','$local_atendimento','$horario_atendimento','$email',
'$telefone','$biografia','$preco','$nomeimagem','$idusuario_session','2')"; 
}else{
    $sql = "INSERT INTO profissionais (Nome, Profissao, Local_Atendimento, 
Horario_Atendimento, Email, Telefone, Biografia, Precos, Foto, IdUsuario, Oculta) VALUES 
('$nome','$profissao','$local_atendimento','$horario_atendimento','$email',
'$telefone','$biografia','$preco','$nomeimagem','$idusuario_session','1')"; 
}


if($conn->query($sql)){

    if(isset($_POST['a'])){

        header("Location: ../views/profissionais.php?e=d3d9446802a44259755d38e6d163e820");
        exit();
    }else{

        header("Location: ../adm/index.php?e=a1d0c6e83f027327d8461063f4ac58a6");
        exit();
    }

}else{
    echo "erro ao cadastar usuasrio = ". $conn->error;
 }
    }
}else{ 
    header("Location: ../adm/index.php");
    exit();
}
}else{ 
    header("Location: ../adm/index.php");
    exit();
}
}else{
    header("Location: ../index.php");
    exit();
}
?>