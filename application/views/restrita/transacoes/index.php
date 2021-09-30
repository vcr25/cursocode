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
                             Transação 
                            </th>
                            <th>Data </th>
                            <th>Metodo de Pagamento</th>
                            
                            <th>Status</th>
                            <th class="nosort">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <?php foreach($transacoes as $transacao): ?>
                            <td>
                             <?php echo $transacao->transacao_codigo_hash; ?>
                            </td>
                            <td><?php echo formata_data_banco_com_hora($transacao->transacao_data) ;  ?></td>
                            
                            <td><?php  switch($transacao->transacao_tipo_metodo_pagamento){
                                case 1:
                                    echo '<div class="badge badge-secondary badge-shadow"><i class="fa fa-credit-card" aria-hidden="true">&nbsp;&nbspCartão de Credito</i></div>';
                                    break;
                                  case 2:
                                    echo '<div class="badge badge-info badge-shadow"><i class="fas fa-barcode">&nbsp;&nbspBoleto</i></div>';
                                    break;
                                 default:
                                    echo '<div class="badge badge-success badge-shadow"><i class="fas fa-university">&nbsp;&nbspTransferência Bancária</i></div>';
                                    break;
                            }   ?></td>

                            <td>
                            <?php  switch($transacao->transacao_status){
                                                    case 1:
                                                      echo '<div class="badge badge-secondary badge-shadow">Aguardando Pagamento</div>';
                                                      break;
                                                    case 2:
                                                      echo '<div class="badge badge-info badge-shadow">Em  Análise</div>';
                                                      break;
                                                    case 3:
                                                      echo '<div class="badge badge-success badge-shadow">Pago</div>';
                                                      break;
                                                    case 4:
                                                      echo '<div class="badge badge-light badge-shadow">Disponível</div>';
                                                      break;
                                                    case 5:
                                                      echo '<div class="badge badge-warning badge-shadow">Em Disputa</div>';
                                                      break;
                                                    case 6:
                                                      echo '<div class="badge badge-danger badge-shadow">Devolvido</div>';
                                                      break;
                                                    case 7:
                                                        echo '<div class="badge badge-danger badge-shadow">Cancelada</div>';
                                                        break;
                                                    case 8:
                                                        echo '<div class="badge badge-success badge-shadow">Debitado</div>';
                                                        break;
                                                    case 9:
                                                        echo '<div class="badge badge-info badge-shadow">Retenção Temporário</div>';
                                                        break;
                                                  } 
                                                   ?>
                            </td>
                            <td>
                            <a  href="<?php echo base_url('restrita/transacoes/view/'.$transacao->transacao_id) ?>" class="btn btn-primary"><i class="fas fa-eye fa-lg"></i></a>
                            
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

     