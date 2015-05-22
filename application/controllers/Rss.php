<?php
class Rss extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                $this->load->model('rss_model');

        }
    
        public function index(){
                $data['links'] = $this->rss_model->get_links();
                $data['title'] = 'RSS News Feed';
		//assigning variables into data array.
                $this->load->view('templates/header', $data);
                $this->load->view('rss/index', $data);
		  $this->load->view('templates/footer');
        }

	public function view($query){
		  $subject = uri_string();
		  $search = 'rss/view';
		  $replace = "";
		  $query = str_replace($search, $replace, $subject);
		  $data['rss'] = $this->rss_model->get_rss($query);
          	  $data['title'] = 'RSS'.$query.'Feed';
		  //assigning variables into data array. 
		  $this->load->view('templates/header', $data);
                $this->load->view('rss/view', $data);
		  $this->load->view('templates/footer');
	}
    
}