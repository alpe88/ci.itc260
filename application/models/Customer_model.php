<?php
/**
 * Customer_model.php - a CI Controller for a generic customer.
 * 
 * Additionaly, it does CRUD within the CI Framework.
 * 
 * @package ITC260
 * @subpackage Customer
 * @author Aleksandar Petrovic <alpe88.junk@gmail.com>
 * @version 1.0 2015/04/30 
 * @link http://www.thisisablankspace.com/ 
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Customer.php
 * @see index.php
 * @todo finish the model
 */
/**
 * Customer - controller for our CRUD demo
 *
 * Detailed Description
 *
 * Properties of Class - list of params.
 *
 * Description of Class Instantiating Code
 *
 * The class uses the following functions:
 *	__construct() - constructs the class
 *	index() - sets up the view for a single customer
 *
 * @see Customer_model.php
 * @todo none
 */
class Customer_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_news($slug = FALSE)
    {
            if ($slug === FALSE)
            {
                    $query = $this->db->get('news');
                    return $query->result_array();
            }

            $query = $this->db->get_where('news', array('slug' => $slug));
            return $query->row_array();
    }

    public function set_news()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('news', $data);
    }
}
