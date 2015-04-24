<?php
class Rss extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                $this->load->model('rss_model');
				$this->config->set_item('banner', 'News Banner');
        }
    
        public function index($query = 'Ice+Cream'){
                $data['rss'] = $this->rss_model->get_rss($query);
                $data['title'] = 'RSS News Feed';
				
				
				//assigning variables into data array. 
                #$this->load->view('templates/header', $data);
                $this->load->view('rss/index', $data);
                #$this->load->view('templates/footer', $data);
        }
    
}