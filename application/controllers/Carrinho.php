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
              'info_produto' => $this->input->post('info_produto')
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

   public function destroy($redirect = null) {
      $this->cart->destroy();

      if ($redirect) {
         redirect(base_url('carrinho'));
      }
   }

   public function checkout() {
      if (count($this->cart->contents()) > 0) {
         foreach ($this->cart->contents() as $produto) {
            $dados = array('nome_produto' => $produto['name'],
                'quantidade' => $produto['qty'],
                'info_produto' => $produto['info_produto']
            );

            $this->db->insert('compras_maisamigas', $dados);
         }

         //LIMPA CARRINHO
         $this->destroy();

         $this->session->set_flashdata('addCarrinho', "Pedido realizado com sucesso.");
         redirect(base_url('home'));
      } else {
         redirect(base_url('carrinho'));
      }
   }

}
