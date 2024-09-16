<?php

$innerContent = '
<div class="section-1">
    <div>
        <h3 class="title-adm2">Painel de Profissionais</h3>
        <p class="title-adm2 pb-3">Local de listagem e gerenciamento de profissionais.</p>
    </div>      

    <div class="caixa__login_edit p-4 border-opacity-50 border border-black">
        <a href="index.php?e=a87ff679a2f3e71d9181a67b7542122c" class="x-sair">X</a>
        <h3 class="text-center text-title pb-4">Criando Profissional</h3>
      
        <form class="row" action="../scripts/cad-prof.php" method="POST" enctype="multipart/form-data">
            <div class="col-5">
                <div class="caixa__login-input">
                    <input type="text" name="nome" id="nome">
                    <label style="top: -20px; left: 0; color: #16a776; font-size: 13px;">Nome Completo</label>
                </div>
                <div class="caixa__login-input">
                    <input type="text" name="email" id="email"/>
                    <label style="top: -20px; left: 0; color: #16a776; font-size: 13px;">Email</label>
                </div>
                <div class="caixa__login-input">
              <input type="text" name="profissao" id="profissao"/>
              <label style="top: -20px; left: 0; color: #16a776; font-size: 13px;">Profissão</label>
          </div>
            </div>

            <div class="col-1"></div>

            <div class="col-5">
                <img id="preview" height="200" src="../fotos/outros/user.png" class="pb-2" style="border-radius: 30px; min-width: 200px; max-width: 300px;">  
                <br>
                <input accept="image/*" class="form-control border-1 border-dark" type="file" required name="imagem" id="imagem" onchange="previewImagem(event)">
            </div>

        <div class="mt-4 row">
            <div class="caixa__login-input col" >
                <input type="text" name="horario_atendimento" id="horario_atendimento" />
                <label style="top: -20px; left: 10px; color: #16a776; font-size: 13px;">Horário de Atendimento</label>
            </div>
            <div class="caixa__login-input col">
                <input type="text" name="preco" id="preco"/>
                <label style="top: -20px; left: 10px; color: #16a776; font-size: 13px;">Preços</label>
            </div>
            <div class="caixa__login-input col">
                <input type="text" minlength="8" maxlength="14" name="telefone" id="telefone"/>
                <label style="top: -20px; left: 10px; color: #16a776; font-size: 13px;">Número de Telefone</label>
            </div>
        </div>
        <div class="row">
        <div class="col-12">
        <div class="caixa__login-input">
        <input type="text" name="local_atendimento" id="addressInput"/>
        <label style="top: -20px; left: 0; color: #16a776; font-size: 13px;">Local de Atendimento</label>
      </div>
      
        </div>
    </div>
        <div class="row">
            <div class="col-12 mb-4">
                <label style="top: -10px; left: 0; color: #16a776; font-size: 13px;">Biografia</label>
                <textarea name="biografia" id="biografia"></textarea>
                <script>
                    CKEDITOR.replace("biografia");
                </script>
            </div>
        </div>

       



        <div class="col-5"></div>
        <input type="hidden" name="id_usuario" id="id_usuario" value="$idusuario">
        <div class="text-center">
        <button type="submit" class="btn border border-black border-opacity-25 ml-3" style="background-color:#80CCB1; width: 120px">Cadastrar</button>
        </div>
    </div>
    </form>

</div>

<script>
    function previewImagem(event) {
        var input = event.target;
        var imagem = input.files[0];
        var imgPreview = document.getElementById("preview");
            
        var reader = new FileReader();
        reader.onload = function(){
            imgPreview.src = reader.result;
        };
        reader.readAsDataURL(imagem);
    }
</script>

';
echo $innerContent;

?>
