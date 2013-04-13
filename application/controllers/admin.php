<?php 

class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->base_url = $this->config->item("base_url");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('M_book');
	}
	function index(){
		redirect("admin/bookview/");
	}
	function login(){
		$data['title'] = "管理页面";
		$data['base_url'] = $this->base_url;
		$data['heading'] = "登录";
		$data['query'] = $this->db->get('admin');
		$this->load->view('admin_login', $data);
	}
	function bookview(){
		$data['title'] = "管理页面";
		$data['base_url'] = $this->base_url;
		$data['heading'] = "图书列表";
		$order = $this->input->post('order');
		if ( $order == '' ) $order = 'bookid';
		$ordertype = $this->input->post('ordertype');
		if ( $ordertype == '' ) $ordertype = 'asc';
		$data['query'] = $this->M_book->get('bookinfo', $order, $ordertype);
		$data['idToNameU'] = $this->M_book->idToName('user');
		$this->load->view('admin_bookview', $data);
	}
	function booksearch(){
		$data['title'] = "管理页面";
		$data['base_url'] = $this->base_url;
		$data['heading'] = "查询结果";
		$item = $this->input->post('search');
		$type = $this->input->post('type');
		$data['idToNameU'] = $this->M_book->idToName('user');
		if( $type == 'owner' ) {
			$item = $data['idToNameU'][$item];
		}	
		if( $item == '' ) $data['blank'] = 1;
		else {
			$data['post'] = $this->M_book->booksearch($item, $type);
			$data['blank'] = 0;
		}
		$this->load->view('admin_booksearch', $data);
	}
	function tradeview(){
		$data['title'] = "管理页面";
		$data['base_url'] = $this->base_url;
		$data['heading'] = "交易列表";
		$order = $this->input->post('order');
		if ( $order == '' ) $order = 'tradeid';
		$ordertype = $this->input->post('ordertype');
		if ( $ordertype == '' ) $ordertype = 'asc';
		$data['query'] = $this->M_book->get('tradeinfo', $order, $ordertype);
		$data['idToNameU'] = $this->M_book->idToName('user');
		$data['idToNameB'] = $this->M_book->idToName('book');
		$this->load->view('admin_tradeview', $data);
	}
	function tradesearch(){
		$data['title'] = "管理页面";
		$data['base_url'] = $this->base_url;
		$data['heading'] = "查询结果";
		$item = $this->input->post('search');
		$type = $this->input->post('type');
		$data['idToNameU'] = $this->M_book->idToName('user');
		$data['idToNameB'] = $this->M_book->idToName('book');
		if ( $type == 'owner' || $type == 'buyer' ) {
			$item = $data['idToNameU'][$item];
		}
		if($item == '') $data['blank'] = 1;
		else {
			$data['post'] = $this->M_book->tradesearch($item, $type);
			$data['blank'] = 0;
		}
		$this->load->view('admin_tradesearch', $data);
	}

}
?>