<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('ProdutosModel','ConfiguracoesModel','UsuariosModel','PedidosModel'));
	}

	public function index()
	{
		$config = $this->ConfiguracoesModel->getConfiguracoes();
		$produtos = $this->ProdutosModel->getProdutos();
		$logado = $this->UsuariosModel->getUsuario($this->session->userdata('logado_front'));

		$data = array('title'=> $config->nome, 
				'descricao' => $config->descricao,
				'frete' => $config->frete,
				'logado' => $logado,
				'produtos' => $produtos
		);

		$this->template->frontend('carrinho', $data);
	}

	public function finalizar()
	{
		if($this->session->userdata('logado_front')){
			$config = $this->ConfiguracoesModel->getConfiguracoes();
			$produtos = $this->cart->contents();
			$logado = $this->UsuariosModel->getUsuario($this->session->userdata('logado_front'));
			$data = array('title'=> $config->nome,
					'descricao' => $config->descricao,
					'logado' => $logado,
					'produtos' => $produtos
			);

			$this->template->frontend('checkout', $data);
		}
		else{
			redirect(base_url('login'));
		}
	}

	public function checkout()
	{
		if($this->session->userdata('logado_front')){
			$config = $this->ConfiguracoesModel->getConfiguracoes();
			$logado = $this->UsuariosModel->getUsuario($this->session->userdata('logado_front'));

			$data['token'] = $config->token;
			$data['email'] = $config->email_pgto;
			$data['currency'] = 'BRL';

			$i=1; 
			foreach ($this->cart->contents() as $item ){ 
				$data['itemId'.$i] = $item['id'];
				$data['itemQuantity'.$i] = $item['qty'];
				$data['itemDescription'.$i] = $item['name'];
				$data['itemAmount'.$i] = number_format($item['price'], 2, '.', '');
				$data['itemWeight'.$i] = $item['peso'];
				$this->ProdutosModel->setEstoque($item['id'], $item['qty']);
				$i++;
			}

			$data['senderName'] = $logado->nome;
			$data['senderEmail'] = $logado->email;
			$data['shippingType'] = '1';
			$data['shippingAddressPostalCode'] = $logado->cep;
			$data = http_build_query($data);
			$url = $config->gateway_checkout;

			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			$xml= curl_exec($curl);
			curl_close($curl);
			$xml = simplexml_load_string($xml);

			if($xml){
				$config = $this->ConfiguracoesModel->getConfiguracoes();
				$produtos = $this->cart->contents();
				$data = array('title'=> $config->nome,
						'descricao' => $config->descricao,
						'logado' => $logado,
						'code' =>  $xml->code,
						'url' => $config->gateway_url,
						'produtos' => $produtos
				);

				$data_pedido = array(
						'id_usuario' => $logado->id_usuario,
						'code' => $xml->code
				);

				if($this->PedidosModel->insert('ad_pedidos', $data_pedido)){
					$id_pedido = $this->db->insert_id();
					if(count($produtos)>0){
						foreach ($produtos as $produto){
							$dados = array('id_pedido' => $id_pedido,
									'id_produto' => $produto['id'],
									'qtd' => $produto['qty']
							);

							$this->PedidosModel->insert('ad_pedidos_produtos', $dados);
						}
						$data['id_pedido'] = $this->db->insert_id();
						$this->template->frontend('checkout', $data);
					}
					else{
						redirect(base_url('carrinho'));
					}
				}
			}
		}
		else{
			redirect(base_url('login'));
		}
	}

	public function calcFrete(){
		header('Content-Type: application/json');
		$dados = $this->input->post();
		$dados['cep'] = str_replace('-','',$dados['cep']);
		$result = $this->cep->calcFreteCorreios($dados);
		echo $result;
	}

	public function add_to_cart() {
		$produto = $this->ProdutosModel->getProduto( $this->input->post('id_produto'), 'id_produto' );

		$qtd = !$this->input->post('quantidade') ? '1' : $this->input->post('quantidade');

		$data = array(array(
				'id'      => $produto->id_produto,
				'qty'     => $qtd,
				'price'   => $produto->valor,
				'name'    => $produto->produto,
				'peso' => $produto->peso
		));

		if($this->cart->insert($data)){
			redirect(base_url('carrinho'));
		}
	}

	public function update(){
		$rowid = $this->uri->segment('3');
		$data = array(
				'rowid' => $rowid,
				'qty'   => 0
		);
		if($this->cart->update($data)){
			redirect(base_url('carrinho'));
		}
	}

	public function destroy() {
		$this->cart->destroy();
		redirect(base_url('carrinho'));
	}
}