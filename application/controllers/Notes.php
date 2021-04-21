<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Notes extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->model("notes/Note");
		}

	
		public function index_html() {
			$result['notes'] = $this->Note->get_all();
			$this->load->view("notes/rendernotes", $result);
		}

		public function delete() {
			$input = $this->input->post();
			$this->Note->delete($input);
			$data['notes'] = $this->Note->get_all();
			$this->load->view("notes/rendernotes",$data);
		}

		public function update() {
			$input = $this->input->post();
			$this->Note->update($input);
			$data['notes'] = $this->Note->get_all();
			$this->load->view("notes/rendernotes",$data);
		}

		public function create() {
			$input = $this->input->post();
			$this->Note->create($input);
			$data['notes'] = $this->Note->get_all();
			$this->load->view("notes/rendernotes",$data);
		}
		public function index() {
			$this->load->view("notes/note");
		}

	}

?>