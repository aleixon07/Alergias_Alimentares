<?php


$innerContent = ("
<div>
      <h3 class='table title-adm2'>Painel de Inscrições</h3>
      <p class='table title-adm2 pb-5'>Local de listagem e gerenciamento de inscrições.</p>
</div>

<div>
<h5 class='table title-adm2 mb-4 text-center text-uppercase text-success'>Lista de profissionais enviados</h5>
</div>
<table class='table mb-5 border border-dark border-3'>
    <thead class='table-title table-dark'>
    <th class='col-1' ></th>
    <th class='col-2 '>Nome</th>
    <th class='col-3 '>Email</th>
    <th class='col-2 '>Profissão</th>
    <th class='col-2'></th>
    </thead>
    <tbody>
"); 

    $sql2_prof = "SELECT * FROM profissionais WHERE Oculta = '2'"; 
        $result2_prof = mysqli_query($conn, $sql2_prof); 
        
    

    if (mysqli_num_rows($result2_prof) > 0) {      
        while($lista_prof = mysqli_fetch_assoc($result2_prof)) {      
            $innerContent .= 
            "<tr class='table-info'> 
                <td class=''>";
                
                if (empty($lista_prof['Foto'])) {
                    $innerContent .= "<img src='../fotos/usuarios/user.png' class='ms-3' width='40px' height='40px' style='border-radius:25px;'>";
                } else {
                    $innerContent .= "<img src='../fotos/profissionais/{$lista_prof['Foto']}' class='ms-3' width='40px' height='40px' style='border-radius:25px;'>";
                }
                
                $innerContent .= "</td>
                <td class='text-capitalize'>$lista_prof[Nome]</td>
                <td class=' '>$lista_prof[Email]</td>
                <td class='pr-2 text-capitalize'>$lista_prof[Profissao]</td>

                <td class=' justify-content-end text-end'>
                   <button data-bs-toggle='modal' data-bs-target='#modal$lista_prof[IdProfissional]' class='btn border border-dark border-2 ' ><img src='../fotos/outros/bx-show.svg'></button>

                <button onclick='AlertDeletProf($lista_prof[IdProfissional])' class='btn border border-dark border-2' ><img src='../fotos/outros/bx-trash.svg'></button>
                </td>
            </tr>";

            // modal APROVAR

            $innerContent .= "<div class='modal fade' id='modal$lista_prof[IdProfissional]' tabindex='-1' aria-labelledby='modal$lista_prof[IdProfissional]' aria-hidden='true'>
              <div class='modal-dialog modal-xl '>
                <div class='modal-content'>
                  <div class='modal-header border border-dark bg-dark'>
                    <h5 class='modal-title text-light'>Solicitação de Inscrição</h5>
                  </div>
                  <div class='modal-body border-top border-dark  '>
                      <form class='row' action='../scripts/edit_prof.php' method='POST' enctype='multipart/form-data'>

                      <div class='row mx-3'>
                      <div class='col-8'>
                          <div class='my-3'>
                              <label for='' class='ms-3'>Nome</label>
                              <input required type='text' name='nome' value='$lista_prof[Nome]' class='border-bottom border-dark rounded w-100 ps-3' style='background-color: #ebebed;'>
                          </div>
                          <div class='my-3'>
                              <label for='' class='ms-3'>Email</label>
                              <input required type='text' name='email' value='$lista_prof[Email]' class='border-bottom border-dark rounded w-100 ps-3' style='background-color: #ebebed;'>
                          </div>
                          <div class='my-3'>
                              <label for='' class='ms-3'>Profissão</label>
                              <input required type='text' name='profissao' value='$lista_prof[Profissao]' class='border-bottom border-dark rounded w-100 ps-3' style='background-color: #ebebed;'>
                          </div>
                          <div class='my-3'>
                              <label for='' class='ms-3'>Hórario Atendimento</label>
                              <input required type='text' name='horario_atendimento' value='$lista_prof[Horario_Atendimento]' class='border-bottom border-dark rounded w-100 ps-3' style='background-color: #ebebed;'>
                          </div>
                          <div class='my-3 row'>
                              <div class='col'>
                                  <label for='' class='ms-3'>Preços</label>
                                  <input required type='text' name='preco' value='$lista_prof[Precos]' class='border-bottom border-dark rounded w-100 ps-3' style='background-color: #ebebed;'>
                              </div>
                              <div class='col'>
                                  <label for='' class='ms-3'>Número de Telefone</label>
                                  <input required type='text' value='$lista_prof[Telefone]' name='telefone' class='border-bottom border-dark rounded w-100 ps-3' style='background-color: #ebebed;'>
                              </div>
                          </div>
                      </div>
                      <div class='col'>
                          <img src='../fotos/profissionais/$lista_prof[Foto]' alt='Foto de fundo' style='border-radius: 25px; width: 330px; height:300px;' id='$lista_prof[IdProfissional]'>
                          <input accept='image/*' type='file' class='mt-3 form-control border border-dark' name='imagem' id='imagem' onchange='previewImagem$lista_prof[IdProfissional](event)'>
                          </div>
                  </div>
                    <div class='mx-4'>
                      <div class='col-12 '>
                          <label for='' class='ms-3'>Local de Atendimento</label>
                          <input required type='text' name='local_atendimento' value='$lista_prof[Local_Atendimento]' id='addressInput' class='w-50 border-bottom border-dark rounded w-100 ps-3' style='background-color: #ebebed;'>
                      </div>
                      </div>
                     
                  </div>
                  <div class='mx-4'>
                      <label for='' class='ms-3'>Biografia</label>
                      <textarea required name='biografia' id='biografia$lista_prof[IdProfissional]'>$lista_prof[Biografia]</textarea>
                      <script>
                          CKEDITOR.replace('biografia$lista_prof[IdProfissional]');
                      </script>
                  </div>
                  
                  <div class='mx-3 mb-3'>
                  <input type='hidden' name='aprov' id='' value='$lista_prof[IdProfissional]'>
                  <input type='hidden' name='id_profissional' id='' value='$lista_prof[IdProfissional]'>
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
            function previewImagem$lista_prof[IdProfissional](event) {
                var input = event.target;
                var imagem = input.files[0];
                var imgPreview = document.getElementById('$lista_prof[IdProfissional]');

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

?>