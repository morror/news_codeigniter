<?php
class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> model('news_model');
	}

	public function index($count=0) {
		$data['news'] = $this -> news_model -> get_news_10($count);
		$data['title'] = 'News archive';
		if($this->input->is_ajax_request()){
			$this -> load -> view('news/index', $data);
			return false;
		};
		$this -> load -> view('templates/header', $data);
		$this -> load -> view('news/index', $data);
		$this -> load -> view('news/more');
		$this -> load -> view('templates/footer');
	}
	public function get_all_news() {
		$data['news'] = $this -> news_model -> get_news();
		$data['title'] = 'News archive';

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('news/index', $data);
		$this -> load -> view('news/more');
		$this -> load -> view('templates/footer');
	}
	public function get_next_news($count) {
		
		$data['news'] = $this -> news_model -> get_news_10($count);
		$data['title'] = 'News archive';
		if($this->input->is_ajax_request()){
			$this -> load -> view('news/index', $data);
			return false;
		};
		$this -> load -> view('templates/header', $data);
		$this -> load -> view('news/index', $data);
		$this -> load -> view('news/more');
		$this -> load -> view('templates/footer');
		
	}
	
	public function get_news_all($page = 1) {
		$pageCount = $this -> news_model -> get_news_all();	
		$data['pages'] = ceil($pageCount/5);	
		
		$data['news'] = $this -> news_model -> get_news_10($page*5-5);
		$data['title'] = 'News archive';
		
		
		
		$this -> load -> view('templates/header', $data);
		$this -> load -> view('news/index', $data);
		$this -> load -> view('news/pages', $data);
		$this -> load -> view('templates/footer');
	}
	
	public function view($id) {
		
		$data['news_item'] = $this -> news_model -> get_news($id);

		if (empty($data['news_item'])) {
			show_404();
		}

		$data['title'] = $data['news_item']['title'];

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('news/view', $data);
		$this -> load -> view('templates/footer');
	}

	public function create() {
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');

		$data['title'] = 'Create a news item';

		$this -> form_validation -> set_rules('title', 'Title', 'required');
		$this -> form_validation -> set_rules('text', 'text', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$this -> load -> view('templates/header', $data);
			$this -> load -> view('news/create');
			$this -> load -> view('templates/footer');

		} else {
			$this -> news_model -> set_news();
			$this -> load -> view('news/success');
		}
	}

}
