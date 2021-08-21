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
                    <a href="<?php echo base_url('restrita/usuarios/core') ?>" class="btn btn-dark "> <i class="far fa-edit"></i>Cadastrar Novo Usuário</a>
                  </div>

                  <div class="card-body">
                  <!-- Msg de Sucesso -->
                  <?php if($msg = $this->session->flashdata('sucesso')): ?>
                    <div class="alert alert-dark alert-dismissible show fade">
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

                    <div class="table-responsive">
                      <table class="table table-striped data-table"  id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Nome Completo</th>
                            <th>Email</th>
                            <th>Usuário</th>
                            <th>Perfil</th>
                            <th>Status</th>
                            <th class="nosort">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <?php foreach($usuarios as $usu): ?>
                            <td>
                            <?php echo $usu->id; ?>
                            </td>
                            <td><?php echo $usu->first_name. ' ' .$usu->last_name;  ?></td>
                            <td class="align-middle">
                              <!--<div class="progress progress-xs">
                                <div class="progress-bar bg-success width-per-40">
                                </div>
                              </div>-->
                              <?php echo $usu->email; ?>
                            </td>
                            <td>
                            <?php echo $usu->username; ?>
                            <!-- <img alt="image" src="<?php echo base_url('public/assets/img/users/user-4.png" width="35" '); ?>" > -->
                            </td>
                            <td>
                            <?php echo ($this->ion_auth->is_admin($usu->id) ? 'Administrador' : 'Cliente'); ?>
                            </td>
                            <td>
                              <div ><?php echo ($usu->active == 1 ? '<span class="badge badge-success badge-shadow">Ativo</span>' : '<span class="badge badge-danger badge-shadow" >Inativo</span>'); ?></div>
                            </td>
                            <td>
                            <a href="<?php echo base_url('restrita/usuarios/core/'.$usu->id) ?>" class="btn btn-primary"><i class="far fa-edit"></i></a>
                            <a href="<?php echo base_url('restrita/usuarios/delete/'.$usu->id) ?>" class="btn btn-danger delete" data-confirm="Deseja realmente excluir o usuário ?"> <i class="fas fa-trash"></i></a>
                            </td>
                          
                          </tr> 
                        </tbody>

                        <?php endforeach; ?>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <?php $this->load->view('restrita/layout/settings_sidebar'); ?> 
      </div>

     