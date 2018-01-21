<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

   public function index() {
      $header['title'] = 'Mais Amigas | Produto';
      $header['description'] = 'Produto';
      $this->load->view('header', $header);
      
     
      //CONTENT DA PÁGINA (HOME)
      $this->load->view('produto', $data);
      $this->load->view('footer');
   }

   public function apiProdutosBusca() {
      $url = "https://api.github.com/users/".$this->input->post('login');
      $opts = [
          'http' => [
              'method' => 'GET',
              'header' => [
                  'User-Agent: PHP'
              ]
          ]
      ];

      var_dump(file_get_contents($url, false, stream_context_create($opts)));
   }
}
