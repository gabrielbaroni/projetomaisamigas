<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

   public function apiProdutosBusca() {
      $url = "https://api.github.com/users/" . $this->input->post('login');
      $opts = [
          'http' => [
              'method' => 'GET',
              'header' => [
                  'User-Agent: PHP'
              ]
          ]
      ];

      $json = json_decode(file_get_contents($url, false, stream_context_create($opts)));

      $header['title'] = 'Produto ' . $json->login;
      $header['description'] = 'Confira nossos produtos';
      $this->load->view('header', $header);

      //TRAZ O PRODUTO PROCURADO
      $data['produto'] = $json;

      //CONTENT DA PÁGINA (HOME)
      $this->load->view('busca', $data);
      $this->load->view('footer');
   }

}
