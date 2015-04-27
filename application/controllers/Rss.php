<?php
class Rss extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                $this->load->model('rss_model');
				$this->config->set_item('banner', 'News Banner');
        }
    
        public function index()
		{
                $data['title'] = 'RSS News Feed';
				$data['link'] = $this->rss_model->get_links();
				//assigning variables into data array. 
                #$this->load->view('templates/header', $data);
                $this->load->view('rss/index', $data);
                #$this->load->view('templates/footer', $data);
        }
		
		public function view()
		{
			$query = $this->input->post('"$rss_category[\'link\']"');
			$data['rss'] = $this->rss_model->get_rss($query);
			$this->load->view('rss/view', $data);
		}
    
}