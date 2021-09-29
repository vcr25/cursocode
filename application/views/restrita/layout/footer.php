<?php if($this->router->fetch_class() != 'login'): ?>
  <?php if($this->router->fetch_method() != 'imprimir'): ?>

<footer class="main-footer">
        <div class="footer-left">
          <a href="#">VCR25</a></a>
        </div>
        <div class="footer-right">
        </div>
</footer>
  <?php endif; ?>
<?php endif; ?>

  </div>
  </div>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url('public/assets/js/app.min.js'); ?>"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?php echo base_url('public/assets/js/scripts.js'); ?>"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>
   <!-- Custom JS File -->
   <script src="<?php echo base_url('public/assets/mask/custom.js'); ?>"></script>
   <script src="<?php echo base_url('public/assets/mask/jquery.mask.min.js'); ?>"></script>

   <!-- Util JS File -->
   <script src="<?php echo base_url('public/assets/js/util.js'); ?>"></script>

   <!-- scripts secundários -->
   <?php if(isset($scripts)): ?>
    <?php foreach ($scripts as $script): ?>
      <script src="<?php echo base_url('public/assets/'.$script); ?>"></script>
    <?php endforeach; ?>
  <?php endif; ?>
  
  <script>
    $('.delete').on("click", function(e){
      event.preventDefault();
      var choice = confirm($(this).attr('data-confirm'));

      if(choice){
        window.location.href = $(this).attr('href');
      }
    });
  </script>
</body>



</html>