<?php

$innerContent = '
<div class="w-100 row">
    <div class="col-8" style="margin-left:120px;"> 
        <h3 class="table title-adm2">Painel de Usuários</h3>
        <h5 class="table title-adm2">Local de listagem e gerenciamento de usuários.</h5>
    </div>
    <div class="col mt-3">
        <form action="" class="box bg-dark-subtle py-1 ps-1 pe-5 border-dark border border-2" style="width: 285px; height: auto;">
            <input type="text" placeholder="Pesquisa..." name="p" class="ms-3">';

if (isset($_GET['e']) && !empty($_GET['e'])) {
    $e = $_GET['e'];
    $innerContent .= '<input type="hidden" name="e" id="e" value="' . $e . '">';
}

$innerContent .= '
    <button type="submit" class="bg-dark-subtle" style="border: none;"><i class="bi bi-search" style="border: none;"></i></button>
</form>
    </div>
</div>';
if (isset($_GET['p']) && !empty($_GET['p'])) {

    $p = $_GET['p'];

    $sql2 = "SELECT * FROM usuario WHERE Nivel  = 1 AND LOWER(Nome) LIKE LOWER('%$p%')";
    $result2 = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result2) == 0) {
        $sql3 = "SELECT * FROM usuario WHERE Nivel  = 1 AND LOWER(Email) LIKE LOWER('%$p%')";
        $result2 = mysqli_query($conn, $sql3);
    }
} else {
    $sql2 = "SELECT * FROM usuario WHERE Nivel  = 1";
    $result2 = mysqli_query($conn, $sql2);
}


$count = $result2->num_rows;

$innerContent .= '

<h3 class="me-5 mb-3 text-end border-dark border-2 mt-5" style="font-size: 25px;">Usuários Encontrados: <span class="text-success">' . $count . '</span></h3>
<table class="table mb-5 border border-dark border-3">
<thead class="table-title table-dark">
<th class="col-1" ></th>
<th class="col-3 ">Nome</th>
<th class="col-3 ">Email</th>
<th class="col-1 ">Nível</th>
<th class="col-2"></th>
</thead>
<tbody>';

if (mysqli_num_rows($result2) > 0) {

    while ($lista = mysqli_fetch_assoc($result2)) {
        $innerContent .= '<tr class="table-info"> 
                <td class="border border-top-0 border-start-0 border-end-0 border-dark border-2">';

        if (empty($lista['Foto'])) {
            $innerContent .= "<img src='../fotos/usuarios/user.png' class='ms-3' width='40px' height='40px' style='border-radius:25px;'>";
        } else {
            $innerContent .= "<img src='../../fotos/usuarios/{$lista['Foto']}'>";
        }

        $innerContent .= '</td>
                <td class="text-capitalize border border-top-0 border-start-0 border-end-0 border-dark border-2">' . $lista['Nome'] . '</td>
                <td class="border border-top-0 border-start-0 border-end-0 border-dark border-2">' . $lista['Email'] . '</td>
                <td class="pr-2 border border-top-0 border-start-0 border-end-0 border-dark border-2 ">Usuário</td>

                <td class="border border-top-0 border-start-0 text-end pe-3 border-end-0 border-dark border-2">

                <a href="../adm/dashboard/form_edit_user.php?id=' . $lista['IdUsuario'] . '" 
                class="btn border border-dark border-2" ><i class="bi bi-pencil-fill"></i></a>

                <button onclick="AlertDeletUser(' . $lista['IdUsuario'] . ')" class="btn  border-2 border border-dark"><i class="bi bi-trash3-fill"></i></button>

                </td>
            </tr>';
    }
} else {
    $error = "<h3 class='text-danger text-center'>Não foram encontrados resultados.</h3>";
}

$innerContent .= "</tbody></table>";

echo $innerContent;

if (isset($error)) {
    echo $error;
}
