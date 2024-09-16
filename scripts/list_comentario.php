<?php

session_start();
include "connection.php";

// Verifica se a solicitação é uma solicitação POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processa os dados POST, se necessário
    // Você pode acessar os dados enviados assim: $_POST['nome_do_campo']

    // Suponha que você queira recuperar comentários de um banco de dados
    // e retornar uma lista de comentários em JSON

    $i = $_POST["i"];

    $sql = "SELECT * FROM comentario WHERE IdReceita = '$i' ORDER BY IdComentario DESC"; // Por exemplo, recupere os últimos 10 comentários
    $result = $conn->query($sql);

    $comentarios = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $idUser = $row['IdUsuario'];
            $sql_user = "SELECT * FROM usuario WHERE IdUsuario = '$idUser'";
            $result_user = mysqli_query($conn,$sql_user);
            $row_user = $result_user->fetch_assoc();
            $nome_user = $row_user["Nome"];
            $nivel = $row_user["Nivel"];
            $foto = $row_user["Foto"];

            if($nivel == 1){

                if(!empty($foto)){
                    $caminho_imagem = "../fotos/usuarios/".$foto;
                }else{
                    $caminho_imagem = "../fotos/outros/user.png";

                }
            }else{

                if(!empty($foto)){
                    $caminho_imagem = "../fotos/administradores/".$foto;
                }else{
                    $caminho_imagem = "../fotos/outros/user.png";

                }

            }


            $comentarios[] = array(
                'IdComentario' => $row['IdComentario'],
                'IdUsuario' => $row['IdUsuario'],
                'IdReceita' => $row['IdReceita'],
                'Data_Postagem' => $row['Data_Postagem'],
                'Conteudo' => $row['Conteudo'],
                'Nome_user' => $nome_user,
                'Foto_user'=> $caminho_imagem
                // Adicione outros campos conforme necessário
            );
        }
    }


    // Prepare a resposta em JSON
    $response = array('comentarios' => $comentarios);

    // Envie a resposta em JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Se a solicitação não for POST, você pode tratar isso de acordo com as suas necessidades
    echo "Esta página lida apenas com solicitações POST.";
}
?>
