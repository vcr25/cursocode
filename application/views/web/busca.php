<?php $this->load->view('web/layout/navbar'); ?>
  
   <!-- Begin Li's Breadcrumb Area -->
   <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
                            
                            <li class="active"><?php echo $termo_digitado; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->

            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                           
                      
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">

                                           <?php if(isset($produtos)):  ?>
                                                <?php foreach($produtos as $produto): ?>

                                                <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="<?php echo base_url('produto/'.$produto->produto_meta_link); ?>">
                                                                <img src="<?php echo base_url('uploads/produtos/'.$produto->foto_caminho); ?>" alt="<?php echo $produto->produto_nome; ?>">
                                                            </a>
                                                            <span class="sticker">Novo</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                            
                                                                <h4><a class="product_name" href="<?php echo base_url('produto/'.$produto->produto_meta_link); ?>"></a><?php echo $produto->produto_nome; ?></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price"> R$: <?php echo number_format($produto->produto_valor, 2); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart active"><a href="shopping-cart.html">Adicionar</a></li>
                                                                    
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>

                                                <?php endforeach; ?>
                                            <?php else: ?>
                                            
                                                <div class="col-lg-12 text-center"> 
                                                <p style="color:#FED700;">Produto não encontrado</p>
                                                   
                                                    <img width="50%" src="<?php echo base_url('public/web/images/taken.svg')?>" alt="product image thumb">
                                                </div>
                                               
                                           <?php endif; ?>
                                               
                                              
                                    </div>

                                  
                                    <div class="paginatoin-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <p>Showing 1-12 of 13 item(s)</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="pagination-box">
                                                    <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                                    </li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li>
                                                      <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->