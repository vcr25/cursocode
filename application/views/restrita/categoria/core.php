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

                  if(isset($categorias)) {
                     $categoria_id = $categorias->categoria_id;
                  }else{
                    $categoria_id = "";
                  }
                  ?>
                
              <?php echo form_open('/restrita/categorias/core/'.$categoria_id, $atributos); ?>
                
                  <div class="card-body">
                    
                  <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Nome da categoria</label>
                        <input type="text" class="form-control" name="categoria_nome" value="<?php echo (isset($categorias) ? $categorias->categoria_nome : set_value('categoria_nome')); ?>" >
                        <?php echo form_error('categoria_nome', '<div class="text-danger">', '</div>'); ?>
                      </div>

                      <?php if(isset($categorias)): ?>
                        <div class="form-group col-md-3">
                        <label for="inputPassword4">Meta Link</label>
                        <input type="text" class="form-control" readonly="" name="categoria_meta_link" id="inputPassword4" value="<?php echo (isset($categorias) ? $categorias->categoria_meta_link : set_value('categoria_meta_link'));?>" >
                       
                      </div>

                      <?php endif; ?>

                      <div class="form-group col-md-3">
                        <label for="inputState">Status</label>
                        <select id="inputState" name="categoria_ativa" class="form-control">
                        <?php if(isset($categorias)): ?>
                          <option value="1" <?php echo($categorias->categoria_ativa == 1 ? 'selected' : ''); ?>>Sim</option>
                          <option value="0" <?php echo($categorias->categoria_ativa == 0 ? 'selected' : ''); ?>>Não</option>
                        <?php else: ?>
                          <option value="1"  >Sim</option>
                          <option value="0"  >Não</option>
                        <?php endif; ?>
                          
                        </select>
                      </div>
                     
                     
                      <div class="form-group col-md-3">
                        <label for="inputState">Categoria Pai</label>
                        <select id="inputState" name="categoria_pai_id" class="form-control">
                        
                        <?php foreach($master as $pai): ?>

                        <?php if(isset($categorias)): ?>
                          <option value="<?php echo $pai->categoria_pai_id; ?>" <?php echo($pai->categoria_pai_id == $categorias->categoria_pai_id  ? 'selected' : ''); ?>><?php echo $pai->categoria_pai_nome; ?></option>
                         
                        <?php else: ?>
                          <option value="<?php echo $pai->categoria_pai_id; ?>" ><?php echo $pai->categoria_pai_nome; ?></option>
                        <?php endif; ?>

                        <?php endforeach; ?>

                        </select>
                      </div>

                    </div>

                  
                    <div class="form-row">
                    

                        <?php if(isset($categorias)) : ?>
                           <input type="hidden" name="categoria_id" value="<?php echo $categorias->categoria_id; ?>">
                        <?php endif; ?>

                    </div>
                    
                  
                  </div>

                  <div class="card-footer">
                    <button class="btn btn-primary mr-2"> <i class="fas fa-user-edit"></i> Salvar</button>
                    <a class="btn btn-dark" href="<?php echo base_url('restrita/categorias'); ?>"> <i class="fas fa-arrow-circle-left"></i> Voltar</a>
                  </div>
              <?php form_close(); ?>
                 
                </div>
              </div>
            </div>
          </div>
        </section>

       <!-- <?php $this->load->view('restrita/layout/settings_sidebar'); ?> -->
      </div>

     