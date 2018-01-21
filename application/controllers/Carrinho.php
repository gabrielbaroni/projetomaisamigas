<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho extends CI_Controller {

   public function index() {
      $header['title'] = 'Seu Carrinho';
      $header['description'] = 'Produtos no seu carrinho';
      $this->load->view('header', $header);
      $this->load->view('carrinho');
      $this->load->view('footer');
   }

   public function addItem() {
      $qtd = !empty($this->input->post('quantidade')) ? $this->input->post('quantidade') : '1';

      $data = array(array(
              'id' => $this->input->post('id_produto'),
              'qty' => $qtd,
              'price' => '0.00',
              'name' => $this->input->post('nome_produto'),
      ));

      if ($this->cart->insert($data)) {
         $this->session->set_flashdata('addCarrinho', "Produto inserido no carrinho.");
         redirect(base_url('home'));
      }
   }

   public function update() {
      $rowid = $this->uri->segment('3');
      $data = array(
          'rowid' => $rowid,
          'qty' => 0
      );
      if ($this->cart->update($data)) {
         $this->session->set_flashdata('msg', "Produto removido do carrinho.");
         redirect(base_url('carrinho'));
      }
   }

}
