<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
   <h1 class="display-4">Seja bem-vindo(a)</h1>
   <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sollicitudin, risus eget sollicitudin dapibus, sem est fermentum nunc, et hendrerit purus ex sed sem. Nunc at lectus quis nulla facilisis congue. Praesent ultricies ultrices tristique. Morbi sodales sapien sit amet diam venenatis rutrum quis sed felis. Fusce finibus consequat justo, eu egestas leo congue ac. Integer velit sapien, condimentum eu libero venenatis, molestie suscipit eros. Nam pulvinar viverra lacus a dictum. Mauris vitae bibendum est. Quisque et augue neque.</p>
</div>

<div class="clearfix"></div>
<div class="mt50"></div>

<ul id="produtos" class="owl-caroussel">
   <li><img src="http://placehold.it/1300x480" alt=""></li>
   <li><img src="http://placehold.it/1300x480" alt=""></li>
   <li><img src="http://placehold.it/1300x480" alt=""></li>
   <li><img src="http://placehold.it/1300x480" alt=""></li>
   <li><img src="http://placehold.it/1300x480" alt=""></li>
</ul>

<div class="clearfix"></div>
<div class="mt50"></div>

<div class="container">
   <div class="card mb-4 box-shadow">
      <div class="card-header"><b>Busque pelo produto</b></div>
      <div class="card-body">
         <div class="form-group">
            <input type="text" class="form-control" id="busca" name="titulo" placeholder="Qual produto está procurando?">
         </div>
         <div class="form-group">
            <button type="button" class="btn btn-lg btn-block btn-danger searchLogin"><i class="fa fa-search" aria-hidden="true"></i> Buscar produto</button>
         </div>
      </div>
   </div>

   <div class="clearfix"></div>
   <div class="mt50"></div>

   <div id="homeProdutos" class="card-deck mb-3 text-center">
      <?php if ($produtosDestaque): ?>
         <?php foreach ($produtosDestaque as $produto): ?> 
            <input type="hidden" name="id_produto" value="<?php echo $produto->id ?>">
            <input type="hidden" name="nome_produto" value="<?php echo $produto->login ?>">
            <input type="hidden" name="info_produto" value="<?php echo $produto->url ?>">
            <div class="card mb-4 box-shadow">
               <div class="card-header">
                  <h4 class="my-0 font-weight-normal" style="text-transform: uppercase"><?php echo $produto->login ?></h4>
               </div>
               <div class="card-body">
                  <img class="card-img-top" src="<?php echo $produto->avatar_url ?>" alt="Card image cap">
                  <?php echo form_open('carrinho/addItem') ?>
                  <ul class="list-unstyled mt-3 mb-4">
                     <li><h6>Descrição do Produto</h6></li>
                     <li style="font-size: 12px"><?php echo $produto->url ?></li>
                     <li>
                        <div class="clearfix"></div>
                        <div class="mt10"></div>
                        <input type="text" name="quantidade" placeholder="Quantidade" class="form-control"></li>
                  </ul>
                  <input type="hidden" name="id_produto" value="<?php echo $produto->id ?>">
                  <input type="hidden" name="nome_produto" value="<?php echo $produto->login ?>">
                  <input type="hidden" name="info_produto" value="<?php echo $produto->url ?>">
                  <button type="submit" class="btn btn-lg btn-block btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> Comprar</button>
                  <?php echo form_close() ?>
               </div>
            </div>
         <?php endforeach; ?>
      <?php else: ?>
            <p class="danger danger-alert">Nenhum produto encontrado.</p>
      <?php endif; ?>
   </div>

</div>


<?php if ($this->session->flashdata('addCarrinho')): ?>
   <script type="text/javascript">
      $(function () {
         swal("", "<?php echo $this->session->flashdata('addCarrinho'); ?>", "success");
      });
   </script>
<?php endif; ?>