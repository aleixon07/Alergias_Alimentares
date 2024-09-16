<?php

session_start();
include "connection.php";
if(isset($_SESSION['id_usuario'])){

    $idusuario_session = $_SESSION["id_usuario"];

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["nome"]) && isset($_POST["alergia"]) && isset($_POST["tempo"]) && isset($_POST["porcoes"]) && isset($_POST["ingrediente"]) && isset($_POST["modo_preparo"]) && isset($_POST["id_usuario"])){

$nome = $_POST["nome"];
$alergia = $_POST["alergia"];
$tempo = $_POST["tempo"];
$porcoes = $_POST["porcoes"];
$ingrediente = $_POST["ingrediente"];
$modo_preparo = $_POST["modo_preparo"];
$id_usuario = $_POST["id_usuario"];
$error = "";

$diretorioDestino = "../fotos/receitas/";
    
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

    if (empty($nome) || empty($alergia) || empty($tempo) || empty($porcoes) || empty($ingrediente) || empty($modo_preparo) ){ 
        $error ="52";
    }
    if($error){ 
        $error2= md5($error);
        header("Location: ../adm/index.php?e=$error2"); 
        exit();

    }else{     


if(isset($_POST['a'])){

    $sql = "INSERT INTO receitas (Nome, Porcoes, Tempo, Tipo_Alergia, Ingredientes, Modo_Preparo, Foto, IdUsuario, Oculta) VALUES ('$nome','$porcoes','$tempo','$alergia','$ingrediente','$modo_preparo','$nomeimagem','$id_usuario','2')"; 

}else{

    $sql = "INSERT INTO receitas (Nome, Porcoes, Tempo, Tipo_Alergia, Ingredientes, Modo_Preparo, Foto, IdUsuario, Oculta) VALUES ('$nome','$porcoes','$tempo','$alergia','$ingrediente','$modo_preparo','$nomeimagem','$id_usuario','1')"; 

}

if($conn->query($sql)){

    if(isset($_POST['a'])){

        header("Location: ../views/receitas.php?e=d3d9446802a44259755d38e6d163e820");
        exit();    

    }else{
    
        header("Location: ../adm/index.php?e=d82c8d1619ad8176d665453cfb2e55f0");
        exit();    
    }
    


}else{
    echo "erro ao cadastar usuasrio = ". $conn->error;
 }
    }
}else{ 
    header("Location: ../adm/index.php?w");
    exit();
}
}else{ 
    header("Location: ../adm/index.php?s");
    exit();
}
}else{ 
    header("Location: ../index.php?sa");
    exit();
}
