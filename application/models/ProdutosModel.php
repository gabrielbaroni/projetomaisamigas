<?php

class ProdutosModel extends CI_Model {

   public function __construct() {
      parent::__construct();
   }

   public function insert($dados) {
      return $this->db->insert('produtos', $dados);
   }

   public function delete($id) {
      $this->db->where('id', $id);
      return $this->db->delete('produtos');
   }

   public function update($dados, $id) {
      $this->db->where('id', $id);
      return $this->db->update('produtos', $dados);
   }

   public function getProduto($id) {
      return $this->db->get_where('produtos', array('id' => $id))->row();
   }

   public function getProdutos() {
      return $this->db->order_by('id', 'DESC')->get_where('produtos')->result();
   }

   public function getCountProdutos() {
      return $this->db->count_all_results('produtos');
   }

}
