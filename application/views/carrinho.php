<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
   <h1 class="display-4"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Seu Carrinho</h1>
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
      <?php if ($this->cart->contents()): ?>
         <?php echo form_open('carrinho/checkout') ?>
         <table class="table table-bordered table-striped">
            <thead>
            <th class="col-md-7">Produto</th>
            <th align="center" class="col-md-1">QTD.</th>
            <th class="col-md-1"></th>
            </thead>
            <tbody>

               <?php foreach ($this->cart->contents() as $item): ?>
                  <tr>
                     <td><?php echo $item['name']; ?></td>
                     <td align="middle"><?php echo $item['qty']; ?></td>
                     <td align="middle"><a href="<?php echo base_url('carrinho/remove/' . $item['rowid']) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
         <button type="submit" class="btn btn-lg btn-block btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> Fechar Pedido</button>
         <?php echo form_close() ?>
      <?php else: ?>
         <p class="alert alert-danger">Carrinho vazio.</p>
      <?php endif; ?>
   </div>
</div>