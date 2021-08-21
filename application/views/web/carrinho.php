<?php $this->load->view('web/layout/navbar'); ?>


<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
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
        <div class="container">
             <div class="row">

                   <?php  if(isset($carrinho) && !empty($carrinho)):   ?>
                    <div class="col-12">
                            <div id="mensagem"></div>
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove">Remover</th>
                                                <th class="li-product-thumbnail">Imagens</th>
                                                <th class="cart-product-name">Produto</th>
                                                <th class="li-product-price">Preço</th>
                                                <th class="li-product-quantity">Quantidade</th>
                                                <th class="li-product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php foreach($carrinho as $produto): ?>
                                            <tr>
                                                <td class="li-product-remove"><a class="btn-del-item" data-id="<?php echo $produto['produto_id']; ?>" href="#"><i class="fa fa-times"></i></a></td>
                                                <td class="li-product-thumbnail"><a href="<?php echo base_url('produto/'.$produto['produto_meta_link']); ?>"><img width="50" src="<?php echo base_url('uploads/produtos/small/' . $produto['produto_foto']); ?>" alt="<?php echo $produto['produto_nome']; ?>"></a></td>
                                                <td class="li-product-name"><a href="<?php echo base_url('produto/'.$produto['produto_meta_link']); ?>"><?php echo $produto['produto_nome']; ?></a></td>
                                                <td class="li-product-price"><span class="amount">R$:&nbsp<?php echo number_format($produto['produto_valor'], 2); ?></span></td>
                                                <td class="quantity" stype="width: 150px;">
                                                
                                                    <div class="cart-plus-minus float-left">
                                                        <input id="produto_<?php echo $produto['produto_id']; ?>" name="produto_quantidade" class="cart-plus-minus-box mask-produto-qty" value="<?php echo $produto['produto_quantidade']; ?>" type="text">
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                    <button type="button"  title="Atualizar quantidade" class="btn btn-info btn-altera-quantidade" data-id="<?php echo $produto['produto_id']; ?>" syle="padding: 10px 15px; border-radius: 2px"><i class="fa fa-refresh"></i></button>
                                                </td>
                                               
                                                <td class="product-subtotal"><span class="amount">R$:&nbsp<?php echo number_format($produto['subtotal'], 2); ?></span></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>

                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                    
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="cep" class="input-text cep" name="cep"  placeholder="CEP" type="text">

                                                <button class="btn btn-info" id="btn-calcula-frete-carrinho" style="padding:8.1px 17px; border-radius:1px;"  type="button"> Calcular frete</button>
                                                <div class="pt-10 text-info" id="retorno-frete"></div>
                                            </div>
                                            
                                            <div class="coupon2">
                                                
                                                <a href="<?php echo base_url('carrinho'); ?>" class="button"><input class="button"  value="Atualizar Carrinho" > </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                               
                                               <button class=" btn btn-outline-info btn-limpa-carrinho" style="border-radius: 2px; font-weigth: 700; cursor:point; heigth: 42px; border-color:#007bb0">Limpar Carrinho</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Total Carrinho</h2>
                                            <ul>
                                                <li>Subtotal <span>R$:&nbsp<?php echo $this->carrinho_compras->get_total(); ?></li>
                                                <li>Frete <span id="opcao_frete_escolhido"> R$&nbsp;0.00 </span></li>
                                                <li>Total Pedido<span id="total_final_carrinho">  R$&nbsp;<?php echo $this->carrinho_compras->get_total(); ?> </span></li>
                                            </ul>
                                            <a href="<?php echo base_url('checkout'); ?>">Finalizar a compra</a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        </div>
                   <?php else: ?>
                  
                    <div class="col-12">
                    <h4 class="mb-10">Carrinho vázio</h4>
                    <div class="coupon-all">
                   
                        <div class="coupon">
                        <a href="<?php echo base_url('/'); ?>" class="button"><input class="button" style="width:240px" value="Continuar Comprando" > </a>
                        </div>
                                            
                    </div>
                    <div class="container">
                        <img width="35%" src="<?php echo base_url('public/web/images/empty_cart.png') ?>" alt="carrinho vazio">
                    </div>
                    </div>
                  
                        
                   <?php endif; ?>

             </div>
        </div>
</div>
            <!--Shopping Cart Area End-->