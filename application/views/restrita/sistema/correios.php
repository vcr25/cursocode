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

                  if(isset($correios)) {
                     $config_id = $correios->config_id;
                  }else{
                    $config_id = "";
                  }
                  ?>
                
              <?php echo form_open('/restrita/sistema/correios'); ?>
                
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
                        <label for="inputEmail4">CEP Origem</label>
                        <input type="text" class="form-control" name="config_cep_origem" value="<?php echo (isset($correios) ? $correios->config_cep_origem : set_value('config_cep_origem')); ?>" >
                        <?php echo form_error('config_cep_origem', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Codigo do PAC</label>
                        <input type="text" class="form-control codigo_servico_correios" name="config_codigo_pac" id="inputPassword4" value="<?php echo (isset($correios) ? $correios->config_codigo_pac : set_value('config_codigo_pac'));?>" >
                        <?php echo form_error('config_codigo_pac', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Codigo do SEDEX</label>
                        <input type="text" class="form-control codigo_servico_sedex" name="config_codigo_sedex" id="inputPassword4" value="<?php echo (isset($correios) ? $correios->config_codigo_sedex : set_value('config_codigo_sedex'));?>" >
                        <?php echo form_error('config_codigo_sedex', '<div class="text-danger">', '</div>'); ?>
                      </div>
                    </div>

                  <div class="form-row">
                      
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Valor adcional do Frete</label>
                        <input type="text" class="form-control money2" name="config_somar_frete" id="inputPassword4"  value="<?php echo (isset($correios) ? $correios->config_somar_frete : set_value('config_somar_frete')); ?>" >
                        <?php echo form_error('config_somar_frete', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Valor declarado</label>
                        <input type="text" class="form-control money2" name="config_valor_declarado" id="inputPassword5" value="<?php echo (isset($correios) ? $correios->config_valor_declarado : set_value('config_valor_declarado')); ?>" >
                        <?php echo form_error('config_valor_declarado', '<div class="text-danger">', '</div>'); ?>
                      </div>
                    </div>
                    

                         <!-- <?php if(isset($correios)) : ?>
                           <input type="hidden" name="sistema_id" value="<?php echo $correios->config_id; ?>">
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

     