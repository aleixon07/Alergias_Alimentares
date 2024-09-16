<?php


$innerContent = ("
<div class='section-1 ''>
      
          <div>
            <h3 class=' title-adm2'>Painel de Administradores</h3>
            <p class=' title-adm2 pb-3'>Local de listagem e gerenciamento de adminitradores.</p>
          </div>      

          <div class='caixa__login_edit p-4 border-opacity-50 border border-black'>

      <a href='index.php?e=c81e728d9d4c2f636f067f89cc14862c' class='x-sair'>X</a>

      <h3 class='text-center text-title pb-4'>Criando Conta </h3>
      
      <form class='row' action='../scripts/cad-adm.php' method='POST' enctype='multipart/form-data'>

          <div class='col-6'>
          <div class='caixa__login-input'>
              <input type='text' name='nome' id='nome'/>
              <label style='color:#16a776; font-size: 13px; top: -20px;'>Nome Completo</label>
          </div>

          <div class='caixa__login-input'>
              <input type='text'name='email' id='email'/>
              <label style='color:#16a776; font-size: 13px; top: -20px;'>Email</label>
          </div>
          <div class='caixa__login-input'>
              <input type='password'name='senha' id='senha'/>
              <label style='color:#16a776; font-size: 13px; top: -20px;'>Senha</label>
          </div>
          
          </div>

          <div class='col-1'></div>

          <div class='col-5'>
            <img id='preview' height='200px' src='../fotos/outros/user.png' class='pb-2' style='border-radius: 30px;  min-width: 200px; max-width: 300px;'>  
            <br>
                <input accept='image/*' class='form-control border-1 border-dark' type='file' name='imagem' id='imagem' onchange='previewImagem(event)'>
          </div>

              <div class='col-2'></div>

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
