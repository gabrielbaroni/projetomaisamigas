<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
   <h1 class="display-4"><i class="fa fa-search" aria-hidden="true"></i> Busca de produtos</h1>
   <p class="lead"></p>
</div>

<div class="container">
   <?php if ($this->session->flashdata('msg')): ?>
      <script type="text/javascript">
         $(function () {
            swal("", "<?php echo $this->session->flashdata('msg'); ?>", "success");
         });
      </script>
   <?php endif; ?>

   <div class="col-md-12">
      <div id="homeProdutos" class="card-deck mb-3 text-center">
         <?php if ($produto): ?>
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
                  <button type="submit" class="btn btn-lg btn-block btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> Adic. Carrinho</button>
                  <?php echo form_close() ?>
               </div>
            </div>
         <?php else: ?>
            <p class="danger danger-alert">Nenhum produto encontrado.</p>
         <?php endif; ?>
      </div>
   </div>
</div>