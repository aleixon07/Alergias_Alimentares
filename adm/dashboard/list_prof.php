<?php

$innerContent = '
<div class="w-100 row">
    <div class="col-8" style="margin-left:120px;"> 
    <h3 class="table title-adm2">Painel de Profissionais</h3>
      <p class="table title-adm2 pb-5">Local de listagem e gerenciamento de profissionais.</p>
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

    $sql2 = "SELECT * FROM profissionais WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') ";
    $result2 = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result2) == 0) {
        $sql3 = "SELECT * FROM profissionais WHERE Oculta = 1 AND LOWER(Email) LIKE LOWER('%$p%')";
        $result2 = mysqli_query($conn, $sql3);
    }

    if (mysqli_num_rows($result2) == 0) {
        $sql4 = "SELECT * FROM profissionais WHERE Oculta = 1 AND LOWER(Profissao) LIKE LOWER('%$p%')";
        $result2 = mysqli_query($conn, $sql4);
    }
} else {
    $sql2 = "SELECT * FROM profissionais WHERE Oculta = 1";
    $result2 = mysqli_query($conn, $sql2);
}


$count = $result2->num_rows;

$innerContent .= '

<div class="row mt-5">
<div class="col-5 text-end" style="padding-right: 75px;">
<a href="index.php?e=c20ad4d76fe97759aa27a0c99bff6710" class=" text-dark rounded border-dark border-2 border p-1" style="text-decoration: none; background-color: #5dba9a;">+ Adicionar Profissional</a>
</div>
<div class="col">
<h3 class="me-5 mb-3 text-end border-dark border-2" style="font-size: 25px;">Profissionais Encontrados: <span class="text-success">' . $count . '</span></h3>

</div>
</div>
<table class="table mb-5 border border-dark border-3">
<thead class="table-title table-dark">
    <th class="col-1"></th>
    <th class="col-3">Nome</th>
    <th class="col-3">Email</th>
    <th class="col-3">Profissão</th>
    <th class="col-2"></th>
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
            $innerContent .= "<img src='../fotos/profissionais/{$lista['Foto']}' class='ms-3' width='40px' height='40px' style='border-radius:25px;'>";
        }

        $innerContent .= "</td><td class='text-capitalize border border-top-0 border-start-0 border-end-0 border-dark border-2'>$lista[Nome]</td>
                <td class='border border-top-0 border-start-0 border-end-0 border-dark border-2 '>$lista[Email]</td>
                <td class='border border-top-0 border-start-0 border-end-0 border-dark border-2 pr-2 text-capitalize'>$lista[Profissao]</td>


                <td class='border border-top-0 border-start-0 text-end pe-3 border-end-0 border-dark border-2'>

                <a href='../adm/dashboard/form_edit_prof.php?id=$lista[IdProfissional]'  
                class='btn border border-dark border-2'><i class='bi bi-pencil-fill'></i></a>

                <button onclick='AlertDeletProf($lista[IdProfissional])' class='btn  border-2 border border-dark'><i class='bi bi-trash3-fill'></i></button>

                </td>
            </tr>";
    }
} else {
    $error = "<h3 class='text-danger text-center'>Não foram encontrados resultados.</h3>";
}



$innerContent .= "</tbody></table>";

echo $innerContent;

if (isset($error)) {
    echo $error;
}
