<?php 
    if (!isset($usuario)){
        header("location: index");
    }
?>

            <div class="auth-container">
                <div class="card">
                   
                    <div class="auth-content">
                        <p class="text-xs-center">ALTERE SEUS DADOS CADASTRAIS</p>
                        <form id="signup-form" action="alterar" method="POST" novalidate="">
                            <div class="form-group"> <label for="firstname">Nome</label>
                                <div class="row">
                                    <div class="col-sm-6"> <input type="text" class="form-control underlined" name="firstname" id="firstname" placeholder="Primeiro nome" required="" value="<?php echo $usuario[0]["nome"]; ?>"> </div>
                                    <div class="col-sm-6"> <input type="text" class="form-control underlined" name="lastname" id="lastname" placeholder="Sobrenome" required="" value="<?php echo $usuario[0]["sobrenome"]; ?>"> </div>
                                </div>
                            </div>
                            <div class="form-group"> <label for="email">Email</label> <input type="email" class="form-control underlined" name="email" id="email" placeholder="Email" required="" value="<?php echo $usuario[0]["login"]; ?>"> </div>
                            <div class="form-group"> <label for="password">Senha</label>
                                <div class="row">
                                    <div class="col-sm-6"> <input type="password" class="form-control underlined" name="password" id="password" placeholder="Senha" required="" value="<?php echo $usuario[0]["senha"]; ?>"> </div>
                                    <div class="col-sm-6"> <input type="password" class="form-control underlined" name="retype_password" id="retype_password" placeholder="Confirmar senha" required="" value="<?php echo $usuario[0]["senha"]; ?>"> </div>
                                </div>
                            </div>
                            <div class="form-group"> <label for="message"> <div class="message">  <?php if ($MENSAGEM_ALTERAR_CADASTRO !='') {echo $MENSAGEM_ALTERAR_CADASTRO ;}?> </div> </label>
                            <input type="hidden" class="form-control underlined" name="id" id="id" required="" value="<?php echo $usuario[0]["id"]; ?>">
                            <div class="form-group"> <button type="submit" name="cadastrar" id="cadastrar" class="btn btn-block btn-primary">Alterar</button> </div>
                            <div class="form-group">
                                <p class="text-muted text-xs-center">Seus dados estão corretos? <a href="index">Cancelar</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-xs-center">
                    <a href="index" class="btn btn-secondary rounded btn-sm"> <i class="fa fa-arrow-left"></i> Voltar para página principal </a>
                </div>
            </div>
