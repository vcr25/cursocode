
<div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4><?php echo $titulo; ?></h4>
              </div>
              <div class="card-body">
                <!-- Msg de Erro -->
                <?php if($msg = $this->session->flashdata('erro')): ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $msg; ?>
                      </div>
                    </div>
                <?php endif; ?>

                <?php 
                    $atributo = array(
                        'class' => 'needs-validation',
                    );
                ?>

            <?php echo form_open('restrita/login/auth'); ?>
                
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Senha</label>
                      <!--<div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Esqueceu a Senha?
                        </a>
                      </div>-->
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                   
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Me Lembre</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Logar
                    </button>
                  </div>
               <?php echo form_close(); ?>
                
               
              </div>
            </div>
            <!--<div class="mt-5 text-muted text-center">
             Não tem conta ? <a href="auth-register.html">Criar Conta</a>
            </div>-->
          </div>
        </div>
      </div>
    </section>
  </div>