<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
   <h1 class="display-4">Seja bem-vindo(a)</h1>
   <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sollicitudin, risus eget sollicitudin dapibus, sem est fermentum nunc, et hendrerit purus ex sed sem. Nunc at lectus quis nulla facilisis congue. Praesent ultricies ultrices tristique. Morbi sodales sapien sit amet diam venenatis rutrum quis sed felis. Fusce finibus consequat justo, eu egestas leo congue ac. Integer velit sapien, condimentum eu libero venenatis, molestie suscipit eros. Nam pulvinar viverra lacus a dictum. Mauris vitae bibendum est. Quisque et augue neque.</p>
</div>

<ul id="produtos" class="owl-caroussel">
   <li><img src="http://placehold.it/1300x480" alt=""></li>
   <li><img src="http://placehold.it/1300x480" alt=""></li>
   <li><img src="http://placehold.it/1300x480" alt=""></li>
   <li><img src="http://placehold.it/1300x480" alt=""></li>
   <li><img src="http://placehold.it/1300x480" alt=""></li>
</ul>


<div class="container">
   <div class="card-deck mb-3 text-center">
      <div class="col-md-12">
         <h1 class="text-center">Busque pelo produto</h1>
      </div>
      <?php foreach ($produtosDestaque as $produto): ?>
         <div class="card mb-4 box-shadow">
            <div class="card-header">
               <h4 class="my-0 font-weight-normal"><?php echo $produto->login?></h4>
            </div>
            <div class="card-body">
               <h1 class="card-title pricing-card-title">R$15</h1>
               <ul class="list-unstyled mt-3 mb-4">
                  <li><h6>Descrição do Produto</h6></li>
                  <li style="font-size: 12px"><?php echo $produto->url?></li>
               </ul>
               <button type="button" class="btn btn-lg btn-block btn-primary">Comprar</button>
            </div>
         </div>
      <?php endforeach; ?>
   </div>
</div>