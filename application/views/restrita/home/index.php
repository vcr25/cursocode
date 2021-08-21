<?php $this->load->view('restrita/layout/navbar'); ?>

<?php $this->load->view('restrita/layout/sidebar'); ?>


<!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->

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
            <div class="alert alert-success alert-dismissible ">
              <?php echo 'Bem Vindo(a) ' . $usuario->first_name ." ". $usuario->last_name . '!' ?>
            </div>
          </div>
         
           
         
        </section>

       <!-- <?php $this->load->view('restrita/layout/settings_sidebar'); ?> -->
      </div>

     