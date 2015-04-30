<?php
class Rss_model extends CI_Model {
public function get_rss($query){
            $request = "https://news.google.com/news?pz=1&cf=all&ned=us&hl=en&output=rss&q=$query&oq=$query";
            $response = file_get_contents($request);
            $rss =  new SimpleXMLElement($response);
			return $rss;
        }
public function get_links(){
			$this->load->helper('array');
			$links = array("1"=>"icecream","2"=>"strawberries","3"=>"bubblegum",);
			return $links;
}
        
}