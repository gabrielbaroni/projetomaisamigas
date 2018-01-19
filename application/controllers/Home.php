<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$header['title'] = 'Seja Bem-vindo(a)';
		$header['description'] = 'Confira nossos produtos';
		$this->load->view('header', $header);
      $data['produtosDestaque'] = '';
		$this->load->view('home');
		$this->load->view('footer');
	}
}
