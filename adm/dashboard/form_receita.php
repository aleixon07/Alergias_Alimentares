<?php


$innerContent = ("
<div class='section-1 ''>
      
          <div>
            <h3 class=' title-adm2'>Painel de Receitas</h3>
            <p class=' title-adm2 pb-3'>Local de listagem e gerenciamento de receitas.</p>
          </div>      

          <div class='caixa__login_edit p-4 border-opacity-50 border border-black'>

      <a href='index.php?e=e4da3b7fbbce2345d7772b0674a318d5' class='x-sair'>X</a>

      <h3 class='text-center text-title pb-4'>Criando Profissional</h3>
      
      <form class='row' action='../scripts/cad-receita.php' method='POST' enctype='multipart/form-data'>

          <div class='col-5'>
          <div class='caixa__login-input'>
              <input type='text' name='nome' id='nome'/>
              <label style='color:#16a776; font-size: 13px; top: -20px;'>Nome da Receita</label>
          </div>

          <div class='caixa__login-input'>
              <input type='text'name='alergia' id='alergia'/>
              <label style='color:#16a776; font-size: 13px; top: -20px;'>Tipo de Alergia</label>
          </div>
          <div class='caixa__login-input'>
              <input type='time'name='tempo' id='tempo'/>
              <label style='color:#16a776; font-size: 13px; top: -20px;'>Tempo de Preparo</label>
          </div>
          <div class='caixa__login-input'>
          <input type='text' name='porcoes' id='porcoes'/>
          <label style='color:#16a776; font-size: 13px; top: -20px;'>Porções</label>
        </div>
          
          </div>

          <div class='col-1'></div>

          <div class='col-5 pt-5'>
            <img id='preview' height='200' src='../fotos/outros/receita.png' class='pb-2' style='border-radius: 30px; background-color: #c4c4c4; min-width: 200px; max-width: 300px;'>  
            <br>
            <input class='form-control border-1 border-dark' required type='file' accept='image/*' name='imagem' id='imagem' onchange='previewImagem(event)'>
            </div>


            <div class='row'>
            <div class='col-12 mb-4'>
              <label style='top: -10px; left: 0; color: #16a776; font-size: 13px;'>Ingredientes</label>
              <textarea name='ingrediente' id='ingrediente'></textarea>
              <script>
                CKEDITOR.replace('ingrediente');
              </script>
            </div>
          </div>
  
          <div class='row'>
            <div class='col-12 mb-4'>
              <label style='top: -10px; left: 0; color: #16a776; font-size: 13px;'>Modo de Preparo</label>
              <textarea name='modo_preparo' id='modo_preparo'></textarea>
              <script>
                CKEDITOR.replace('modo_preparo');
              </script>
            </div>
          </div>

    <div class='col-5'></div>
    <input type='hidden' name='id_usuario' id='id_usuario' value='$idusuario'>
        <button type='submit' class='btn border border-black border-opacity-25 ml-3' style='background-color:#80CCB1; width: 120px'>Cadastrar</button>
      </form>
      </div>

    </div>

<script>
        function previewImagem(event) {
            var input = event.target;
            var imagem = input.files[0];
            var imgPreview = document.getElementById('preview');
            
            var reader = new FileReader();
            reader.onload = function(){
                imgPreview.src = reader.result;
            };
            reader.readAsDataURL(imagem);
        }
    </script>

");

echo $innerContent; 

?>