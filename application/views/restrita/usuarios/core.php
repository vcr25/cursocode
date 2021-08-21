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

                  if(isset($usuario)) {
                     $usuario_id = $usuario->id;
                  }else{
                    $usuario_id = "";
                  }
                  ?>
                
              <?php echo form_open('/restrita/usuarios/core/'.$usuario_id, $atributos); ?>
                
                  <div class="card-body">
                    
                  <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Nome</label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo (isset($usuario) ? $usuario->first_name : set_value('first_name')); ?>" >
                        <?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Sobrnome</label>
                        <input type="text" class="form-control" name="last_name" id="inputPassword4" value="<?php echo (isset($usuario) ? $usuario->last_name : set_value('last_name'));?>" >
                        <?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Usuário</label>
                        <input type="text" class="form-control" name="username" id="inputPassword4" value="<?php echo (isset($usuario) ? $usuario->username : set_value('username'));?>" >
                        <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                      </div>
                    </div>

                  <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control"  name="email" id="inputEmail4" value="<?php echo (isset($usuario) ? $usuario->email : set_value('email')); ?>" >
                        <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" name="password" id="inputPassword4" >
                        <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Confirmar Password</label>
                        <input type="password" class="form-control" name="confirma" id="inputPassword5" >
                        <?php echo form_error('confirma', '<div class="text-danger">', '</div>'); ?>
                      </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Status</label>
                        <select id="inputState" name="active" class="form-control">
                        <?php if(isset($usuario)): ?>
                          <option value="1" <?php echo($usuario->active == 1 ? 'selected' : ''); ?>>Sim</option>
                          <option value="0" <?php echo($usuario->active == 0 ? 'selected' : ''); ?>>Não</option>
                        <?php else: ?>
                          <option value="1"  >Sim</option>
                          <option value="0"  >Não</option>
                        <?php endif; ?>
                          
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="inputState">Perfil de Usuário</label>
                        <select id="inputState" name="perfil" class="form-control">

                        <?php foreach ($grupos as $grupo): ?>
                        <?php if(isset($usuario)): ?>
                          <option value="<?php echo $grupo->id; ?>" <?php echo ($grupo->id == $perfil->id ? 'selected' : ''); ?> ><?php echo $grupo->name; ?></option>

                        <?php else: ?>
                          <option value="<?php echo $grupo->id; ?>"  ><?php echo $grupo->name; ?></option>
                        <?php  endif; ?>
                         

                        <?php endforeach; ?>

                          
                        </select>
                      </div>

                          <?php if(isset($usuario)) : ?>
                           <input type="hidden" name="usuario_id" value="<?php echo $usuario->id; ?>">
                          <?php endif; ?>

                    </div>
                    
                  
                  </div>

                  <div class="card-footer">
                    <button class="btn btn-primary mr-2"> <i class="fas fa-user-edit"></i> Salvar</button>
                    <a class="btn btn-dark" href="<?php echo base_url('restrita/usuarios'); ?>"> <i class="fas fa-arrow-circle-left"></i> Voltar</a>
                  </div>
              <?php form_close(); ?>
                 
                </div>
              </div>
            </div>
          </div>
        </section>

       <!-- <?php $this->load->view('restrita/layout/settings_sidebar'); ?> -->
      </div>

     