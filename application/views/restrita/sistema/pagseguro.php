<?php $this->load->view('restrita/layout/navbar'); ?>

<?php $this->load->view('restrita/layout/sidebar'); ?>


<!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="row">
              <div class="col-12">
                <div class="card">

                  <div class="card-header">
                    <h4><?php echo $titulo ?></h4>
                 
                  </div>

                  <?php 
                  $atributos = array(
                    'name' => 'form_core',
                  );

                  if(isset($pagseguro)) {
                     $config_id = $pagseguro->config_id;
                  }else{
                    $config_id = "";
                  }
                  ?>
                
              <?php echo form_open('/restrita/sistema/pagseguro'); ?>
                
                  <div class="card-body">
                     <!-- Msg de Sucesso -->
                  <?php if($msg = $this->session->flashdata('sucesso')): ?>
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $msg; ?>
                      </div>
                    </div>
                  <?php endif; ?>

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
                  <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">EMAIL</label>
                        <input type="email" class="form-control" name="config_email" value="<?php echo (isset($pagseguro) ? $pagseguro->config_email : set_value('config_email')); ?>" >
                        <?php echo form_error('config_email', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">TOKEN</label>
                        <input type="text" class="form-control " name="config_token" id="inputPassword4" value="<?php echo (isset($pagseguro) ? $pagseguro->config_token : set_value('config_token'));?>" >
                        <?php echo form_error('config_token', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputState">Status</label>
                        <select id="inputState" name="config_ambiente" class="form-control">
                        <?php if(isset($pagseguro)): ?>
                          <option value="1" <?php echo($pagseguro->config_ambiente == 1 ? 'selected' : ''); ?>>Ambiente Sandbox </option>
                          <option value="0" <?php echo($pagseguro->config_ambiente == 0 ? 'selected' : ''); ?>>Ambiente Real</option>
                        <?php else: ?>
                          <option value="1"  >Ambiente Sandbox</option>
                          <option value="0"  >Ambiente Real</option>
                        <?php endif; ?>
                          
                        </select>
                      </div>
                    </div>

                  

                         <!-- <?php if(isset($pagseguro)) : ?>
                           <input type="hidden" name="sistema_id" value="<?php echo $pagseguro->config_id; ?>">
                          <?php endif; ?> -->

                    </div>
                    
                  
                  </div>

                  <div class="card-footer">
                    <button class="btn btn-primary mr-2"> <i class="fas fa-user-edit"></i> Salvar</button>
                    
                  </div>
              <?php form_close(); ?>
                 
                </div>
              </div>
            </div>
          </div>
        </section>

       <!-- <?php $this->load->view('restrita/layout/settings_sidebar'); ?> -->
      </div>

     