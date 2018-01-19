
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
      <link href="<?php echo base_url('public/css/pricing.css'); ?>" rel="stylesheet">

   </head>

   <body>
      <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">

         <h5 class="my-0 mr-md-auto font-weight-normal"><img src="<?php echo base_url('public/images/logo.png') ?>"></h5>
         <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="<?php echo base_url('home')?>">Home</a>
            <a class="p-2 text-dark" href="<?php echo base_url('produtos')?>">Produtos</a>
            <a class="p-2 text-dark" href="<?php echo base_url('sbore')?>">Sobre</a>
            <a class="p-2 text-dark" href="<?php echo base_url('contato')?>">Contato</a>
         </nav>
         <a class="btn btn-outline-primary boxLogar" href="javascript:;">Logar</a>

         <div class="showBoxLogar">
            <?php echo form_open('') ?>
            <div class="form-group">
               <input type="text" class="form-control" name="login" placeholder="Login">
            </div>
            <div class="form-group">
               <input type="password" class="form-control" name="senha" placeholder="Senha">
            </div>
            
            <button type="submit" class="btn btn-xs btn-block btn-primary">Acessar</button>
            <?php echo form_close() ?>
         </div>
      </div>