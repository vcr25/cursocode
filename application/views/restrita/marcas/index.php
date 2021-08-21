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
                    <a href="<?php echo base_url('restrita/marcas/core') ?>" class="btn btn-dark "> <i class="far fa-edit"></i>Cadastrar Nova Marca</a>
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
                             ID  
                            </th>
                            <th>Nome </th>
                            <th>Meta Link</th>
                            <th>Data Criação</th>
                            <th>Status</th>
                            <th class="nosort">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <?php foreach($marcas as $usu): ?>
                            <td>
                            <i data-feather="grid"></i> &nbsp; <?php echo $usu->marca_id; ?>
                            </td>
                            <td><?php echo $usu->marca_nome ;  ?></td>
                            <td class="align-middle ">
                              <!--<div class="progress progress-xs">
                                <div class="progress-bar bg-success width-per-40">
                                </div>
                              </div>-->
                              <i data-feather="link-2"></i> &nbsp; <?php echo $usu->marca_meta_link; ?>
                            </td>
                            <td><?php echo formata_data_banco_com_hora( $usu->marca_data_criacao);  ?></td>
                            <td>
                              <div ><?php echo ($usu->marca_ativa == 1 ? '<span class="badge badge-success badge-shadow">Ativo</span>' : '<span class="badge badge-danger badge-shadow" >Inativo</span>'); ?></div>
                            </td>
                            <td>
                            <a href="<?php echo base_url('restrita/marcas/core/'.$usu->marca_id) ?>" class="btn btn-primary"><i class="far fa-edit"></i></a>
                            <a href="<?php echo base_url('restrita/marcas/delete/'.$usu->marca_id) ?>" class="btn btn-danger delete" data-confirm="Deseja realmente excluir a Marca ?"> <i class="fas fa-trash"></i></a>
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

      <!--  <?php $this->load->view('restrita/layout/settings_sidebar'); ?> -->
      </div>

     