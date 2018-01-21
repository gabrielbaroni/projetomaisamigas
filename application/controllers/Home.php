<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

   public function index() {
      $header['title'] = 'Seja Bem-vindo(a)';
      $header['description'] = 'Confira nossos produtos';
      $this->load->view('header', $header);
      
      //TRAZ OS PRODUTOS QUE NO CASO SÃO OS LOGINS
      $data['produtosDestaque'] = $this->apiProdutos();
      
      //CONTENT DA PÁGINA (HOME)
      $this->load->view('home', $data);
      $this->load->view('footer');
   }

   public function apiProdutos() {
      $url = "https://api.github.com/users";
      $opts = [
          'http' => [
              'method' => 'GET',
              'header' => [
                  'User-Agent: PHP'
              ]
          ]
      ];

      $json = file_get_contents($url, false, stream_context_create($opts));
      return json_decode($json);
   }
}
