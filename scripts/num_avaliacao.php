<?php

session_start();
include "connection.php";

if(isset($_POST["id_profissional"])){

    $id_prof = $_POST["id_profissional"];

    $sql = "SELECT * FROM avaliacao WHERE IdProfissional = '$id_prof'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $num_rows = mysqli_num_rows($result);
        
        $sum = 0; // Inicialize uma variável para armazenar a soma
    
        while ($row = mysqli_fetch_assoc($result)) {
            $num_star = $row['Num_Star'];
            
            if (is_array($num_star)) {
                foreach ($num_star as $value) {
                    $sum += $value; // Adicione o valor atual à soma
                }
            } else {
                $sum += $num_star; // Se não for um array, adicione o valor único à soma
            }
        }

        if ($num_rows !== 0) {
            $med_avaliacao = $sum / $num_rows;
            $med_avaliacao_formatada = number_format($med_avaliacao, 1);
            echo $med_avaliacao_formatada;
        } else {
            echo "0.0"; // Ou qualquer valor padrão desejado se não houver avaliações
        }

    }

}else{
    echo "não tem id de profissional";
}
