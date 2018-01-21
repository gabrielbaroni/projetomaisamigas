<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#SITE
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

#CARRINHO
$route['carrinho/addItem'] = 'Carrinho/addItem';
$route['carrinho/remove/(:any)'] = 'Carrinho/update';

#API
$route['api/users'] = 'Home/apiProdutos';
$route['api/busca'] = 'Produto/apiProdutosBusca';