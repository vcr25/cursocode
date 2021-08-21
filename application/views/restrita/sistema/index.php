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

                  if(isset($sistema)) {
                     $sistema_id = $sistema->sistema_id;
                  }else{
                    $sistema_id = "";
                  }
                  ?>
                
              <?php echo form_open('/restrita/sistema/'); ?>
                
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
                        <label for="inputEmail4">Nome</label>
                        <input type="text" class="form-control" name="sistema_razao_social" value="<?php echo (isset($sistema) ? $sistema->sistema_razao_social : set_value('sistema_razao_social')); ?>" >
                        <?php echo form_error('sistema_razao_social', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Nome Fantasia</label>
                        <input type="text" class="form-control" name="sistema_nome_fantasia" id="inputPassword4" value="<?php echo (isset($sistema) ? $sistema->sistema_nome_fantasia : set_value('sistema_nome_fantasia'));?>" >
                        <?php echo form_error('sistema_nome_fantasia', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Cidade</label>
                        <input type="text" class="form-control" name="sistema_cidade" id="inputPassword4" value="<?php echo (isset($sistema) ? $sistema->sistema_cidade : set_value('sistema_cidade'));?>" >
                        <?php echo form_error('sistema_cidade', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">CEP</label>
                        <input type="text" class="form-control " name="sistema_cep" id="inputPassword4" value="<?php echo (isset($sistema) ? $sistema->sistema_cep : set_value('sistema_cep'));?>" >
                        <?php echo form_error('sistema_cep', '<div class="text-danger">', '</div>'); ?>
                      </div>
                    </div>

                  <div class="form-row">

                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Email</label>
                        <input type="sistema_email" class="form-control"  name="sistema_email" id="inputEmail4" value="<?php echo (isset($sistema) ? $sistema->sistema_email : set_value('sistema_email')); ?>" >
                        <?php echo form_error('sistema_email', '<div class="text-danger">', '</div>'); ?>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="inputPassword4">telefone fixo</label>
                        <input type="text" class="form-control phone_with_ddd" name="sistema_telefone_fixo" id="inputPassword4"  value="<?php echo (isset($sistema) ? $sistema->sistema_telefone_fixo : set_value('sistema_telefone_fixo')); ?>" >
                        <?php echo form_error('sistema_telefone_fixo', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">endereco</label>
                        <input type="text" class="form-control" name="sistema_endereco" id="inputPassword5" value="<?php echo (isset($sistema) ? $sistema->sistema_endereco : set_value('sistema_endereco')); ?>" >
                        <?php echo form_error('sistema_endereco', '<div class="text-danger">', '</div>'); ?>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Estado</label>
                        <input type="text" class="form-control" name="sistema_estado" id="inputPassword5" value="<?php echo (isset($sistema) ? $sistema->sistema_estado : set_value('sistema_estado')); ?>" >
                        <?php echo form_error('sistema_estado', '<div class="text-danger">', '</div>'); ?>
                      </div>

                    </div>
                    

                         <!-- <?php if(isset($sistema)) : ?>
                           <input type="hidden" name="sistema_id" value="<?php echo $sistema->sistema_id; ?>">
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

     