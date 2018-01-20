
<div class="container">
   <footer class="pt-4 my-md-5 pt-md-5 border-top">
      <div class="row">
         <div class="col-12 col-md">
            <img class="mb-2" src="<?php echo base_url('public/images/logo.png') ?>" alt="" width="80" height="">
            <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
         </div>
         <div class="col-6 col-md">
            <h5>Produtos</h5>
            <ul class="list-unstyled text-small">
               <li><a class="text-muted" href="#">Cama, Mesa e Banho</a></li>
               <li><a class="text-muted" href="#">Móveis</a></li>
               <li><a class="text-muted" href="#">Eletrodomésticos</a></li>
            </ul>
         </div>
         <div class="col-6 col-md">
            <h5>Sobre</h5>
            <ul class="list-unstyled text-small">
               <li><a class="text-muted" href="#">Nossas Lojas</a></li>
               <li><a class="text-muted" href="#">A Empresa</a></li>
            </ul>
         </div>
         <div class="col-6 col-md">
            <h5>Contato</h5>
            <ul class="list-unstyled text-small">
               <li><a class="text-muted" href="#">Trabalhe Conosco</a></li>
               <li><a class="text-muted" href="#">SAC</a></li>
               <li><a class="text-muted" href="#">Termos de Uso</a></li>
            </ul>
         </div>
      </div>
   </footer>
</div>
</div>

<script src="<?php echo base_url('public/js/jquery.js') ?>"></script>
<script src="<?php echo base_url('public/js/bootstrap.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>

<script>
   $(function () {
      $('.boxLogar').click(function () {
         $('.showBoxLogar').toggle();
      });

      $("#produtos").owlCarousel({
         items: 1,
         singleItem: true,
         itemsScaleUp: true,
         slideSpeed: 500,
         autoPlay: 5000,
         stopOnHover: true
      });

   });
</script>

</body>
</html>