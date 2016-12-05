                    <div class="auth-container">
                <div class="card">
                    
                    <div class="auth-content">
                        <p class="text-xs-center">ENTRE NA SUA CONTA PARA CONTINUAR</p>
                        <form id="login-form" action="logar" method="POST" novalidate="">
                            <div class="form-group"> <label for="username">Usuário</label> <input type="text" class="form-control underlined" name="username" id="username" placeholder="Seu email" required> </div>
                            <div class="form-group"> <label for="password">Senha</label> <input type="password" class="form-control underlined" name="password" id="password" placeholder="sua senha" required> </div>
                            <div class="form-group"> <label for="message"> <div class="message">  <?php if ($MENSAGEM_LOGIN !='') {echo $MENSAGEM_LOGIN ;}?> </div> </label>
                            <div class="form-group"> <button type="submit" name="logar" id="logar" class="btn btn-block btn-primary">Login</button> </div>
                            <div class="form-group">
                                <p class="text-muted text-xs-center">Não possui uma conta? <a href="../usuario/cadastrar">Cadastre-se!</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-xs-center">
                    <a href="index.php" class="btn btn-secondary rounded btn-sm"> <i class="fa fa-arrow-left"></i> Voltar para página principal </a>
                </div>
            </div>
        
