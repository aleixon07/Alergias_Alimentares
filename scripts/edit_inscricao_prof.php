<?php

session_start(); //verifica a sessão

include "connection.php";

if (isset($_SESSION['id_usuario'])) { 
 if(isset($_POST['id_profissional'])){
   
if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["profissao"]) && isset($_POST["local_atendimento"]) && isset($_POST["horario_atendimento"]) && isset($_POST["telefone"]) && isset($_POST["preco"]) && isset($_POST["biografia"])){
    $nome = htmlspecialchars($_POST['nome']); 
    $email = htmlspecialchars($_POST['email']);
    $profissao = htmlspecialchars($_POST['profissao']);
    $local_atendimento = htmlspecialchars($_POST["local_atendimento"]);
    $horario_atendimento = htmlspecialchars($_POST["horario_atendimento"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $preco = htmlspecialchars($_POST["preco"]);
    $biografia = $_POST["biografia"];
    $id_edit = $_POST['id_profissional'];
    $imagem = $_FILES['imagem'];
    $nomeimagem = uniqid($imagem["name"]).".jpeg";
    $nome_imagem = $imagem["name"];
    $error = "";
    
    if (empty($nome) || empty($email) || empty($profissao) || empty($local_atendimento) || empty($horario_atendimento) || empty($telefone) || empty($preco) || empty($biografia)){ 
        $error ="45";
    }
    if($error){ 
        $error2= md5($error);
        header("Location: ../adm/dashboard/form_inscricao_prof.php?e=$error2&id=$id_edit"); 
        exit();
    }

    $sql1 = "SELECT * FROM profissionais WHERE IdProfissional = '$id_edit'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    $caminho_imagem = $row1["Foto"];


    if(isset($caminho_imagem) && !empty($nome_imagem)){

        $caminhoArquivo = "../fotos/profissionais/$caminho_imagem";
        
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
         $diretorioDestino = "../fotos/profissionais/";
         $tipo = $imagem["type"];
         $tamanho = $imagem["size"];
         $tmp_name = $imagem["tmp_name"];
         
         $caminhoDestino = $diretorioDestino .$nomeimagem;
            if (move_uploaded_file($tmp_name, $caminhoDestino)) {
                    echo "Imagem enviada com sucesso!";
                } else {
                    echo "Erro ao enviar a imagem.";
                }

        $sql2 = "UPDATE profissionais SET 
                        Nome ='$nome', 
                        Email ='$email', 
                        Profissao ='$profissao', 
                        Local_Atendimento ='$local_atendimento', 
                        Horario_Atendimento ='$horario_atendimento', 
                        Telefone ='$telefone', 
                        Precos ='$preco', 
                        Biografia ='$biografia', 
                        Oculta = '1',
                        Foto = '$nomeimagem' ##########
                        WHERE  IdProfissional = '$id_edit' ";
        $result2 = mysqli_query($conn, $sql2); 
                               
    
    }else if(empty($nome_imagem)){
        
        $sql2 = "UPDATE profissionais SET 
                        Nome ='$nome', 
                        Email ='$email', 
                        Profissao ='$profissao', 
                        Local_Atendimento ='$local_atendimento', 
                        Horario_Atendimento ='$horario_atendimento', 
                        Telefone ='$telefone', 
                        Precos ='$preco', 
                        Oculta = '1',
                        Biografia ='$biografia',
                        Foto = '$caminho_imagem' #############
                        WHERE  IdProfissional = '$id_edit' ";
        $result2 = mysqli_query($conn, $sql2); 
    }


        header("Location: ../adm/index.php?e=44f683a84163b3523afe57c2e008bc8c"); //se tudo der certo volta para página inicial
        exit();
    
}else{
    header("Location: ../adm/dashboard/form_edit_prof.php"); //de houver erro na consulta redireciona com uma msg por GET
    exit();
 
}        
}else{
    header("Location: ../adm/dashboard/form_edit_prof.php?error=Edit_id faltando"); //de houver erro na consulta redireciona com uma msg por GET
    exit();
 
} 
}else {
    header('Location: ../index.php'); //se o usuário não estiver logado redireciona para a tela do login
    exit();
}
