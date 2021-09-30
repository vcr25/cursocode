<?php $this->load->view('restrita/layout/navbar'); ?>

<?php $this->load->view('restrita/layout/sidebar'); ?>


<!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="row ">
            <div class="col-12 col-md-4 col-lg-12">
                <div class="pricing pricing-highlight">
                  <div class="pricing-title mt-3 p-3">
                 
                            
                    Pedido <a target="_blank" href="<?php echo base_url('restrita/pedido/imprimir/'.$transacao->pedido_codigo) ?>" class="btn btn-primary"><?php echo $transacao->pedido_codigo ?></i></a>
                  </div>
                  <div class="pricing-padding text-left">
                    <div class="mb-4 pricing-item">
                      <div class="pricing-item-label"><?php  switch($transacao->transacao_status){
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
                                                   ?></div>
                      <div></div>
                    </div>
                    <div class="pricing-details">
                      <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">Cliente: &nbsp;<?php echo $transacao->pedido_cliente_nome; ?></div>
                      </div>
                      <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">Data da Compra: &nbsp;<?php    echo formata_data_banco_com_hora($transacao->transacao_data) ?></div>
                      </div>
                      <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">Valor do Pedido:&nbsp;<?php  echo 'R$:' . number_format($transacao->transacao_valor_bruto, 2) ?></div>
                      </div>

                      <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">Forma de pagamento: &nbsp;<?php  switch($transacao->transacao_tipo_metodo_pagamento){
                                case 1:
                                    echo '<div class="badge badge-secondary badge-shadow"><i class="fa fa-credit-card" aria-hidden="true">&nbsp;&nbspCartão de Credito</i></div>';
                                    break;
                                  case 2:
                                    echo '<div class="badge badge-info badge-shadow"><i class="fas fa-barcode">&nbsp;&nbspBoleto</i></div>';
                                    break;
                                 default:
                                    echo '<div class="badge badge-success badge-shadow"><i class="fas fa-university">&nbsp;&nbspTransferência Bancária</i></div>';
                                    break;
                            }   ?></div>
                      </div>
                      <?php if($transacao->transacao_tipo_metodo_pagamento == 2 || $transacao->transacao_tipo_metodo_pagamento == 3): ?>
                        <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">Link de Pagamento:&nbsp;&nbsp;<a href="<?php echo $transacao->transacao_link_pagamento; ?>" target="_blank" rel="noopener noreferrer"><i class="fas fa-link">&nbsp;Gerar</i></a></div>
                      </div>
                      <?php endif; ?>
                      <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">Taxa PagSeguro:&nbsp; <?php echo 'R$:'. number_format($transacao->transacao_valor_taxa_pagseguro, 2) ?></div>
                      </div>
                      <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">Valor Liquido:&nbsp; <?php echo 'R$:'. number_format($transacao->transacao_valor_liquido, 2) ?></div>
                      </div>
                      <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">Parcelas:&nbsp; <?php echo $transacao->transacao_numero_parcelas ?></div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="pricing-cta">
                    <a href="<?php echo base_url('restrita/transacoes'); ?>">Voltar <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      <!--  <?php $this->load->view('restrita/layout/settings_sidebar'); ?> -->
      </div>

     