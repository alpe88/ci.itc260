<?php
class Rss_model extends CI_Model {


	public function get_rss($query)
	{
            $request = "https://news.google.com/news?pz=1&cf=all&ned=us&hl=en&q=$query&output=rss";
            $response = file_get_contents($request);
            $xml =  new SimpleXMLElement($response);
			return $xml;
    }
	
	public function get_links()
	{
		$linkArr = ['Ice+Cream', 'Bubble+Gum', 'Strawberries'];
		return $linkArr;
	}
}
