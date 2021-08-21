<?php $this->load->view('web/layout/navbar'); ?>


<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container-fluid">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
                
                <li class="active"><?php echo $titulo; ?></a></li>

            </ul>
        </div>
    </div>
</div>

 <!--Shopping Cart Area Strat-->
 <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container-fluid">
             <div class="row">

               <div class="container text-center text-success">
               <?php foreach($pedido_realizado as $pedido): ?>
                   <h5 class="mb-20"> <?php echo $pedido->cliente_nome_completo; ?> </h5>
                   <h6 class="mb-20"> <?php echo $pedido->mensagem; ?> </h6>



                   <div class="bg-primary badge text-white " style="padding: 1rem; font-size: 16px">
                        <?php echo $pedido->pedido_gerado; ?>
                   </div>

                   <?php if($pedido->forma_pagamento != 1): ?>
                        <div class="mt-15">
                            <a href="<?php echo $pedido->transacao_link_pagamento; ?>" target="_blank">
                                <i class="fa fa-barcode fa-5x"></i>
                                <p class="text-success"><?php echo ($pedido->forma_pagamento = 2 ? 'Imprimir Boleto de pagamento' : 'Concluir pagamento no ambiente do seu banco'); ?> </p>
                            </a>
                        </div>
                   <?php endif; ?>

                <?php endforeach; ?>

               </div>

             </div>
        </div>
</div>
            <!--Shopping Cart Area End-->