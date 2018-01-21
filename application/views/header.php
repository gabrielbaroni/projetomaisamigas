
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="<?php echo $description ?>">
      <meta name="author" content="Gabriel Baroni - https://github.com/gabrielbaroni">

      <title>MAIS AMIGAS | <?php echo $title ?></title>

      <!-- Bootstrap core CSS -->
      <link href="<?php echo base_url('public/css/bootstrap.css'); ?>" rel="stylesheet">
      <link href="<?php echo base_url('public/css/bootstrap-grid.css'); ?>" rel="stylesheet">
      <link href="<?php echo base_url('public/css/main.css'); ?>" rel="stylesheet">
      <link href="<?php echo base_url('public/css/easy-autocomplete.css'); ?>" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet">

      <script>var root = '<?php echo base_url() ?>';</script>
      <script src="<?php echo base_url('public/js/jquery-1.11.2.min.js') ?>"></script>
      <script src="<?php echo base_url('public/js/bootstrap.js') ?>"></script>
      <script src="<?php echo base_url('public/js/jquery.easy-autocomplete.js') ?>"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

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
            
            $('.searchLogin').click(function(){
               var login = $('#busca').val();

               if(login.length > 2){
                  $.ajax({
                     type: 'post',
                     dataType: 'json',
                     url: root + 'api/busca',
                     data: {login: login},
                     success: function(obj){
                        console.log(JSON.parse(obj));
                     }
                  });
               }
               else{
                  swal("","Informe um produto/login","error");
               }
               
            });
            
         });
      </script>      
   </head>

   <body>
      <div class="bg-white border-bottom box-shadow">
         <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3">
               <h5 class="my-0 mr-md-auto font-weight-normal"><img src="<?php echo base_url('public/images/logo.png') ?>"></h5>
               <nav class="my-2 my-md-0 mr-md-3">
                  <a class="p-2 text-dark" href="<?php echo base_url('home') ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                  <a class="p-2 text-dark" href="<?php echo base_url('carrinho') ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho <span class="badge badge-light"><?php echo count($this->cart->contents())?></span></a>
                  <a class="p-2 text-dark" href="<?php echo base_url('sobre') ?>"><i class="fa fa-info-circle" aria-hidden="true"></i> Sobre</a>
                  <a class="p-2 text-dark" href="<?php echo base_url('contato') ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contato</a>
               </nav>
            </div>
         </div>
      </div>