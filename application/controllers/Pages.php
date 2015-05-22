<?php
class Pages extends CI_Controller {

function _remap($method)
    {
        
        is_file(APPPATH.'views/pages/'.$method.'.php') OR show_404();
		
		$headerdata['title'] = ucfirst($method);
		$headerdata['nav'] = $this->navigation->load($method);
				
		$this->load->view('templates/header', $headerdata);
		$this->load->view("pages/$method");
		$this->load->view('templates/footer');
  
    }

    /*public function view($page = 'home')	
    {
            if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
            {
                    // Whoops, we don't have a page for that!
                    show_404();
            }

            $data['title'] = ucfirst($page); // Capitalize the first letter
	    
	    $headerdata['nav'] = $this->navigation->load($method);



            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
    }*/
}
