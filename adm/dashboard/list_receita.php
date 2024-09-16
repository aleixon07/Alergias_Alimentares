<?php

$innerContent = '
<div class="w-100 row">
    <div class="col-7" style="margin-left:150px;"> 
    <h3 class="table title-adm2">Painel de Receitas</h3>
      <p class="table title-adm2 pb-5">Local de listagem e gerenciamento de receitas.</p>
    </div>

    <div class="col mt-3">
        <form action="" class="box bg-dark-subtle py-1 ps-1 pe-5 border-dark border border-2" style="width: 285px; height: auto;">
            <input type="text" placeholder="Pesquisa..." name="p" class="ms-3">
            ';

if (isset($_GET['e']) && !empty($_GET['e'])) {
    $e = $_GET['e'];
    $innerContent .= '<input type="hidden" name="e" id="e" value="' . $e . '">';
}

$innerContent .= '
    <button type="submit" class="bg-dark-subtle" style="border: none;"><i class="bi bi-search" style="border: none;"></i></button>
    <select class="form-select ms-4 bg-dark-subtle  py-1 ps-1 border-dark border border-2" name="t" aria-label="">
            <option value="" selected>Escolha...</option>
            <option value="1">5 min</option>
            <option value="2">15 min</option>
            <option value="3">30 min</option>
            <option value="4">60 min</option>
            <option value="5">+ 60 min</option>
        </select>
</form>

    </div>
    
</div>';
if (isset($_GET['p']) && isset($_GET['t'])) {

    $p = $_GET['p'];
    $t = $_GET['t'];

    if (empty($t)) {

        $t = '00:00:00';

        $sql2 = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') ";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) == 0) {
            $sql3 = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Tipo_Alergia) LIKE LOWER('%$p%')";
            $result2 = mysqli_query($conn, $sql3);
        }

    } else if ($t == 1) {
        $t = '00:05:00';

        $sql2 = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') AND Tempo <= '$t' ";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) == 0) {
            $sql3 = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Tipo_Alergia) LIKE LOWER('%$p%') AND Tempo <= '$t'";
            $result2 = mysqli_query($conn, $sql3);
        }        

    } else if ($t == 2) {
        $t = '00:15:00';

        $sql2 = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') AND Tempo <= '$t' ";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) == 0) {
            $sql3 = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Tipo_Alergia) LIKE LOWER('%$p%') AND Tempo <= '$t'";
            $result2 = mysqli_query($conn, $sql3);
        }

    } else if ($t == 3) {
        $t = '00:30:00';

        $sql2 = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') AND Tempo <= '$t' ";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) == 0) {
            $sql3 = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Tipo_Alergia) LIKE LOWER('%$p%') AND Tempo <= '$t'";
            $result2 = mysqli_query($conn, $sql3);
        }

    } else if ($t == 4) {
        $t = '01:00:00';

        $sql2 = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') AND Tempo <= '$t' ";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) == 0) {
            $sql3 = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Tipo_Alergia) LIKE LOWER('%$p%') AND Tempo <= '$t'";
            $result2 = mysqli_query($conn, $sql3);
        }

    } else if ($t == 5) {

        $sql4 = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') AND Tempo >= '01:00:00'";
        $result2 = mysqli_query($conn, $sql4);

        if (mysqli_num_rows($result2) == 0) {
            $sql3 = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Tipo_Alergia) LIKE LOWER('%$p%') AND Tempo <= '$t'";
            $result2 = mysqli_query($conn, $sql3);
        }


    }

} else {
    $sql2 = "SELECT * FROM receitas WHERE Oculta = 1";
    $result2 = mysqli_query($conn, $sql2);
}


$count = $result2->num_rows;

$innerContent .= '

<div class="row me-3" style="margin-left:135px;">
<div class="col">
    <div class="row">
        <div class="col-5 text-end" style="">
        <a href="index.php?e=2838023a778dfaecdc212708f721b788" class=" text-dark rounded border-dark border-2 border p-1" style="text-decoration: none; background-color: #5dba9a;">+ Adicionar Receita</a>
        </div>
    <div class="col">
    <h3 class="me-5 mb-3 text-end border-dark border-2" style="font-size: 25px;">Receitas Encontrados: <span class="text-success">' . $count . '</span></h3>

    </div>
</div>
<table class="table mb-5 border border-dark border-3">
<thead class="table-title table-dark">
    <th class="col-1"></th>
    <th class="col">Nome</th>
    <th class="col">Alergia</th>
    <th class="col-3"></th>
</thead>
<tbody>';

if (mysqli_num_rows($result2) > 0) {

    while ($lista = mysqli_fetch_assoc($result2)) {
        $innerContent .=
            "<tr class='table-info'> 
        <td class='border border-top-0 border-start-0 border-end-0 border-dark border-2'>";

        if (empty($lista['Foto'])) {
            $innerContent .= "<img src='../fotos/usuarios/user.png' class='ms-3' width='40px' height='40px' style='border-radius:25px;'>";
        } else {
            $innerContent .= "<img src='../fotos/receitas/{$lista['Foto']}' class='ms-3' width='40px' height='40px' style='border-radius:25px;'>";
        }

        $innerContent .= "</td>
        
        <td style='font-size:15px;' class='text-capitalize border border-top-0 border-start-0 border-end-0 border-dark border-2'>$lista[Nome]</td>
        <td style='font-size:15px;' class='border border-top-0 border-start-0 border-end-0 border-dark border-2 text-capitalize '>$lista[Tipo_Alergia]</td>


                <td class='border border-top-0 border-start-0 text-end pe-3 border-end-0 border-dark border-2 '>

                <a href='../adm/dashboard/form_edit_receita.php?id=$lista[IdReceita]' 
                class='btn border border-dark border-2'><i class='bi bi-pencil-fill'></i></a>

                <button  onclick='AlertDeletReceita($lista[IdReceita])' class='btn  border-2 border border-dark'><i class='bi bi-trash3-fill'></i></button>

                </td>
            </tr>";
    }
} else {
    $error = "<h3 class='text-danger text-center'>Não foram encontrados resultados.</h3>";
}



$innerContent .= "
</tbody></table>
</div>

<div class='col-4'>
    <div class='comentarios' id='coment'>
        <h5 class='text-center bg-dark text-light py-2'>Comentários</h5>
        <div class='border border-dark bg-dark-subtle'>";

$coment = "SELECT * FROM comentario ORDER BY IdComentario DESC";
$result_coment = mysqli_query($conn, $coment);
if (mysqli_num_rows($result_coment) > 0) {

    while ($row_coment = mysqli_fetch_assoc($result_coment)) {
        $id_user_coment = $row_coment["IdUsuario"];

        $sql_u = "SELECT * FROM usuario WHERE IdUsuario = '$id_user_coment'";
        $resul_u = mysqli_query($conn, $sql_u);
        $row_u = mysqli_fetch_assoc($resul_u);
        $nome_u = $row_u['Nome'];
        $foto_u = $row_u['Foto'];
        $nivel_u = $row_u['Nivel'];


        $innerContent .= "
            
            <div class='border border-dark'>
            <div class=''>
            <div class='user-info'>";

        if ($nivel_u == 1) {
            if (!empty($foto_u)) {
                $innerContent .= "<img class='ms-2 mt-2 ' width='40px' height='40px' style='border-radius:25px;' src='../fotos/usuarios/$foto_u'>";
            } else {
                $innerContent .= "<img class='ms-2 mt-2 ' width='40px' height='40px' style='border-radius:25px;' src='../fotos/usuarios/user.png'>";
            }
        } else {
            if (!empty($foto_u)) {
                $innerContent .= "<img class='ms-2 mt-2 ' width='40px' height='40px' style='border-radius:25px;' src='../fotos/administradores/$foto_u'>";
            } else {
                $innerContent .= "<img class='ms-2 mt-2 ' width='40px' height='40px' style='border-radius:25px;' src='../fotos/usuarios/user.png'>";
            }
        }
        $innerContent .= "  
            <h6 style='font-size: 14px;'>$nome_u <span class='text-body-tertiary' style='font-size:13px;'>--$row_coment[Data_Postagem]<span>
            <button onclick='DeletComentario($row_coment[IdComentario])' style='background-color: transparent; border: none;'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='#4d4c4c' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
            </svg>
            </button>
            </h6>
            
            </div>
            <p style='margin-left:60px;'>$row_coment[Conteudo]</p>
            </div>
            </div>
            ";
    }
} else {
    $innerContent .= "<h5 class='text-center text-danger'>Não há comentários cadastrados</h5>";
}

$innerContent .= "</div>
    </div>";


$innerContent .= "

</div>
</div>
</div>
</div>
";


echo $innerContent;

if (isset($error)) {
    echo $error;
}
