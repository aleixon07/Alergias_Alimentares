<?php


$innerContent = ("
<hr>
<div>
<h5 class='table title-adm2  my-4 text-center text-uppercase text-success'>Lista de receitas enviados</h5>
</div>
<table class='table mb-5 border border-dark border-3'>
    <thead class='table-title table-dark'>
    <th class='col-1' ></th>
    <th class='col-2 '>Nome</th>
    <th class='col-2 '>Alergia</th>
    <th class='col-2 '>Porções</th>
    <th class='col-2'></th>
    </thead>
    <tbody>
"); 

    $sql2 = "SELECT * FROM receitas WHERE Oculta = 2"; 
    try {
        $result2 = mysqli_query($conn, $sql2); 
    } catch (Exception $e) {
        header("Location: ../area.php?error=Erro ao recuperar os usuarios");
        exit();
    }

    if (mysqli_num_rows($result2) > 0) {      
        while($lista = mysqli_fetch_assoc($result2)) {      
            $innerContent .= 
            "<tr class='table-info'> 
                <td class=''>";
                
                if (empty($lista['Foto'])) {
                    $innerContent .= "<img src='../fotos/usuarios/user.png' class='ms-3' width='40px' height='40px' style='border-radius:25px;'>";
                } else {
                    $innerContent .= "<img src='../fotos/receitas/{$lista['Foto']}' class='ms-3' width='40px' height='40px' style='border-radius:25px;'>";
                }

                $innerContent .= "<td class='text-capitalize'>$lista[Nome]</td>
                <td class='text-capitalize '>$lista[Tipo_Alergia]</td>
                <td class='pr-2 text-capitalize'>$lista[Porcoes]</td>

                <td class=' justify-content-end text-end'>
                   <button data-bs-toggle='modal' data-bs-target='#modal$lista[IdReceita]' class='btn border border-dark border-2 ' ><img src='../fotos/outros/bx-show.svg'></a>

                <button onclick='AlertDeletReceita($lista[IdReceita])' class='btn border border-dark ms-1 border-2'><img src='../fotos/outros/bx-trash.svg'></button>
                </td>
            </tr>";

             // modal APROVAR

             $innerContent .= "<div class='modal fade' id='modal$lista[IdReceita]' tabindex='-1' aria-labelledby='modal$lista[IdReceita]' aria-hidden='true'>
             <div class='modal-dialog modal-xl '>
               <div class='modal-content'>
                 <div class='modal-header border border-dark bg-dark'>
                   <h5 class='modal-title text-light'>Solicitação de Inscrição</h5>
                 </div>
                 <div class='modal-body border-top border-dark  '>
                     <form class='row' action='../scripts/edit_receita.php' method='POST' enctype='multipart/form-data'>

                     <div class='row mx-3'>
                    <div class='col-8'>
                        <div class='my-4'>
                            <label for='' class='ms-3'>Nome da Receita</label>
                            <input required type='text' name='nome' class='border-bottom border-dark rounded w-100 ps-3' value='$lista[Nome]' style='background-color: #ebebed;'>
                        </div>
                        <div class='my-4'>
                            <label for='' class='ms-3'>Tipo de Alergia</label>
                            <input required type='text' name='alergia' value='$lista[Tipo_Alergia]' class='border-bottom border-dark rounded w-100 ps-3' style='background-color: #ebebed;'>
                        </div>
                        <div class='my-4'>
                            <label for='' class='ms-3'>Tempo de Preparo</label>
                            <input required type='time' name='tempo' value='$lista[Tempo]' id='tempo' class='border-bottom border-dark rounded w-100 ps-3' style='background-color: #ebebed;'>
                        </div>
                        <div class='my-4'>
                            <label for='' class='ms-3'>Porções</label>
                            <input required type='text' value='$lista[Porcoes]' name='porcoes' id='porcoes' class='border-bottom border-dark rounded w-100 ps-3' style='background-color: #ebebed;'>
                        </div>
                    </div>
                    <div class='col'>
                        <img src='../fotos/receitas/$lista[Foto]' class='bg-dark-subtle border border-dark' alt='Foto de fundo' style='border-radius: 25px; width: 330px; height:300px;' id='$lista[IdReceita]'>
                        <input accept='image/*' type='file' class='mt-3 form-control border border-dark' name='imagem' id='imagem' onchange='previewImagem$lista[IdReceita](event)'>
                    </div>
                </div>
                <div class='mx-4'>
                    <label for='' class='ms-3'>Ingredientes</label>
                    <textarea required name='ingrediente' id='ingredientes'>$lista[Ingredientes]</textarea>
                    <script>
                        CKEDITOR.replace('ingredientes');
                    </script>
                </div>
                <div class='mx-4 mt-3'>
                    <label for='' class='ms-3'>Modo de Preparo</label>
                    <textarea required name='modo_preparo' id='modo_preparo'>$lista[Modo_Preparo]</textarea>
                    <script>
                        CKEDITOR.replace('modo_preparo');
                    </script>
                </div>

                 
                 <div class='mx-3 mb-3'>
                     <input type='hidden' name='aprov' id='' value='$lista[IdReceita]'>
                     <input type='hidden' name='id_receita' id='' value='$lista[IdReceita]'>
                 </div>
                 <div class='modal-footer border'>
                     <button type='button' class='btn text-light  bg-danger   border border-dark' data-bs-dismiss='modal'>Fechar</button>
                     <button type='submit' class='btn bg-success text-light border border-dark'>Editar</button>
                     </form>
                 </div>
                 </div>
               </div>
             </div>
           </div>

           <script>
                // Nome da função corrigido no JavaScript
                function previewImagem$lista[IdReceita](event) {
                var input = event.target;
                var imagem = input.files[0];
                var imgPreview = document.getElementById('$lista[IdReceita]');

                var reader = new FileReader();
                reader.onload = function() {
                    imgPreview.src = reader.result;
                };
                reader.readAsDataURL(imagem);
                }
                </script>
                            ";
        }
    }


$innerContent .= "</tbody></table>"; 
echo $innerContent;
