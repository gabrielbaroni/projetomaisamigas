<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index()
	{
		$header['title'] = 'Produtos';
		$header['description'] = 'Todos os nossos produtos';
		$this->load->view('header', $header);
		$this->load->view('produtos');
		$this->load->view('footer');
	}
   
   public function produto(){
      
   }
   
   private function ApiFindAll(){
      
   }

}
