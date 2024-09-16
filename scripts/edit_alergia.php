<?php
session_start();
include "connection.php";

if(isset($_SESSION['id_usuario'])){

    $idusuario_session = $_SESSION["id_usuario"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Obtém os nomes dos campos recebidos por POST
    $nomesCampos = array_keys($_POST);

    // Imprime os nomes dos campos
    foreach ($nomesCampos as $campo) {
        echo "Nome do campo: " . $campo . "<br>";
    }

$cor= $nomesCampos[1];
$text= $nomesCampos[0];
$id = $nomesCampos[2];

if(isset($_POST[$cor]) && isset($_POST[$text]) && isset($_POST[$id])){

$text_area = $_POST[$text];
$favColor = $_POST[$cor];
$id_alergia = $_POST[$id];

if (preg_match("/^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/", $favColor)) {

    $sql2 = "UPDATE alergia_alimentar SET Text_Area = '$text_area', Cor = '$favColor', IdUsuario = '$idusuario_session' WHERE  IdAlergia_Alimentar = '$id_alergia' ";
    $result2 = mysqli_query($conn, $sql2); 
    
        header("Location: ../adm/dashboard/geren_alergias.php?e=c81e728d9d4c2f636f067f89cc14862c&s=$id_alergia");
        exit();
}


}else{
    header("Location: ../adm/dashboard/geren_alergias.php?n deu certo");
    exit();
}
}else{
    header("Location: ../index.php");
    exit();
}
}else {
    header("Location: ../index.php");
    exit();
}
?>
