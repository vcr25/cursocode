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
                    <a href="<?php echo base_url('restrita/cliente/core') ?>" class="btn btn-dark "> <i class="far fa-edit"></i>Cadastrar Novo Usuário</a>
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
                              #ID
                            </th>
                            <th>Nome Completo</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Data Nascimento</th>
                           
                            <th class="nosort">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <?php foreach($clientes as $usu): ?>
                            <td>
                            <?php echo $usu->cliente_id; ?>
                            </td>
                            <td><?php echo $usu->cliente_nome. ' ' .$usu->cliente_sobrenome;  ?></td>
                            <td class="align-middle">
                              <!--<div class="progress progress-xs">
                                <div class="progress-bar bg-success width-per-40">
                                </div>
                              </div>-->
                              <?php echo $usu->cliente_cpf; ?>
                            </td>
                            <td>
                            <?php echo $usu->cliente_telefone_movel; ?>
                            <!-- <img alt="image" src="<?php echo base_url('public/assets/img/users/user-4.png" width="35" '); ?>" > -->
                            </td>
                            <td>
                            <?php echo formata_data_banco_sem_hora($usu->cliente_data_nascimento); ?>
                            </td>
                           
                            <td>
                            <a href="<?php echo base_url('restrita/cliente/core/'.$usu->cliente_id) ?>" class="btn btn-primary"><i class="far fa-edit"></i></a>
                            <a href="<?php echo base_url('restrita/cliente/delete/'.$usu->cliente_id) ?>" class="btn btn-danger delete" data-confirm="Deseja realmente excluir o usuário ?"> <i class="fas fa-trash"></i></a>
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

     