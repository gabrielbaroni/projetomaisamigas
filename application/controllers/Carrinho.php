<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho extends CI_Controller {

	public function index()
	{
		$header['title'] = 'Seu Carrinho';
		$header['description'] = 'Produtos no seu carrinho';
		$this->load->view('header', $header);
		$this->load->view('carrinho');
		$this->load->view('footer');
	}


}
