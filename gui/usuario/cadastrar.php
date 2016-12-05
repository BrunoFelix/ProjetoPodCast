

            <div class="auth-container">
                <div class="card">
                   
                    <div class="auth-content">
                        <p class="text-xs-center">CRIE SUA CONTA PARA CONTINUAR</p>
                        <form id="signup-form" action="cadastrar" method="POST" novalidate="">
                            <div class="form-group"> <label for="firstname">Nome</label>
                                <div class="row">
                                    <div class="col-sm-6"> <input type="text" class="form-control underlined" name="firstname" id="firstname" placeholder="Primeiro nome" required=""> </div>
                                    <div class="col-sm-6"> <input type="text" class="form-control underlined" name="lastname" id="lastname" placeholder="Sobrenome" required=""> </div>
                                </div>
                            </div>
                            <div class="form-group"> <label for="email">Email</label> <input type="email" class="form-control underlined" name="email" id="email" placeholder="Email" required=""> </div>
                            <div class="form-group"> <label for="password">Senha</label>
                                <div class="row">
                                    <div class="col-sm-6"> <input type="password" class="form-control underlined" name="password" id="password" placeholder="Senha" required=""> </div>
                                    <div class="col-sm-6"> <input type="password" class="form-control underlined" name="retype_password" id="retype_password" placeholder="Confirmar senha" required=""> </div>
                                </div>
                            </div>
                            <div class="form-group"> <label for="message"> <div class="message">  <?php if ($MENSAGEM_CADASTRO !='') {echo $MENSAGEM_CADASTRO ;}?> </div> </label>
                            <div class="form-group"> <button type="submit" name="cadastrar" id="cadastrar" class="btn btn-block btn-primary">Cadastrar</button> </div>
                            <div class="form-group">
                                <p class="text-muted text-xs-center">Já possui uma conta? <a href="../usuario/logar">Entre!</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-xs-center">
                    <a href="index" class="btn btn-secondary rounded btn-sm"> <i class="fa fa-arrow-left"></i> Voltar para página principal </a>
                </div>
            </div>
