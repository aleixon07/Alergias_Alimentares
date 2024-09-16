<?php

session_start(); //verifica a sessão

include "connection.php";

if (isset($_SESSION['id_usuario'])) { 
 if(isset($_POST['id_receita'])){
    
if(isset($_POST["nome"]) && isset($_POST["alergia"]) && isset($_POST["tempo"]) && isset($_POST["porcoes"]) && isset($_POST["ingrediente"]) && isset($_POST["modo_preparo"])){
    $nome = htmlspecialchars($_POST['nome']); 
    $alergia = htmlspecialchars($_POST["alergia"]);
    $tempo = htmlspecialchars($_POST["tempo"]);
    $porcoes = htmlspecialchars($_POST["porcoes"]);
    $ingrediente = $_POST["ingrediente"];
    $modo_preparo = $_POST["modo_preparo"];  
    $id_edit = $_POST['id_receita'];
    $imagem = $_FILES['imagem'];
    $nomeimagem = uniqid($imagem["name"]).".jpeg";
    $nome_imagem = $imagem["name"];
    $error = "";
    
    if (empty($nome) || empty($alergia) || empty($tempo) || empty($porcoes) || empty($ingrediente) || empty($modo_preparo)){ 
        $error ="45";
    }
    if($error){ 
        $error2= md5($error);
        header("Location: ../adm/dashboard/form_edit_receita.php?e=$error2&id=$id_edit"); 
        exit();
    }

    $sql1 = "SELECT * FROM receitas WHERE IdReceita = '$id_edit'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    $caminho_imagem = $row1["Foto"];


    if(isset($caminho_imagem) && !empty($nome_imagem)){

        $caminhoArquivo = "../fotos/receitas/$caminho_imagem";
        
        if (file_exists($caminhoArquivo)) {
            if (unlink($caminhoArquivo)) {
                echo 'Arquivo de foto excluído com sucesso.';
            } else {
                echo 'Erro ao excluir o arquivo de foto.';
            }
        } else {
            echo 'O arquivo de foto não existe.';
        }
    }    
    
    if(!empty($nome_imagem)){
         $diretorioDestino = "../fotos/receitas/";
         $tipo = $imagem["type"];
         $tamanho = $imagem["size"];
         $tmp_name = $imagem["tmp_name"];
         
         $caminhoDestino = $diretorioDestino .$nomeimagem;
            if (move_uploaded_file($tmp_name, $caminhoDestino)) {
                    echo "Imagem enviada com sucesso!";
                } else {
                    echo "Erro ao enviar a imagem.";
                }

        $sql2 = "UPDATE receitas SET 
                        Nome ='$nome', 
                        Tipo_Alergia = '$alergia',
                        Tempo = '$tempo',
                        Porcoes = '$porcoes',
                        Ingredientes = '$ingrediente',
                        Modo_Preparo = '$modo_preparo',
                        Oculta = '1',
                        Foto = '$nomeimagem' ##########
                        WHERE  IdReceita = '$id_edit' ";
        $result2 = mysqli_query($conn, $sql2); 
                               
    
    }else if(empty($nome_imagem)){
        
        $sql2 = "UPDATE receitas SET 
                        Nome ='$nome', 
                        Tipo_Alergia = '$alergia',
                        Tempo = '$tempo',
                        Porcoes = '$porcoes',
                        Ingredientes = '$ingrediente',
                        Modo_Preparo = '$modo_preparo',
                        Oculta = '1',
                        Foto = '$caminho_imagem' #############
                        WHERE  IdReceita = '$id_edit' ";
        $result2 = mysqli_query($conn, $sql2); 
    }


        header("Location: ../adm/index.php?e=44f683a84163b3523afe57c2e008bc8c"); //se tudo der certo volta para página inicial
        exit();
    
}else{
    header("Location: ../adm/dashboard/form_edit_receita.php"); //de houver erro na consulta redireciona com uma msg por GET
    exit();
 
}      
}else{
    header("Location: ../adm/dashboard/form_edit_receita.php?error=Edit_id faltando"); //de houver erro na consulta redireciona com uma msg por GET
    exit();
 
} 
}else {
    header('Location: ../index.php'); //se o usuário não estiver logado redireciona para a tela do login
    exit();
}
