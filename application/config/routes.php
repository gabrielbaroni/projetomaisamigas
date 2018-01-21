<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#SITE
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['busca'] = 'Produto/apiProdutosBusca';

#CARRINHO
$route['carrinho/addItem'] = 'Carrinho/addItem';
$route['carrinho/remove/(:any)'] = 'Carrinho/update';
$route['carrinho/checkout'] = 'Carrinho/checkout';

#API
$route['api/users'] = 'Home/apiProdutos';