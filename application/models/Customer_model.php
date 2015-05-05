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
 * @todo set_news();
 */
class Customer_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_customers($slug = FALSE)
    {
            if ($slug === FALSE)
            {
                    $query = $this->db->get('test_Customers');
                    return $query->result_array();
            }
            $query = $this->db->get_where('test_Customers', array('CustomerID' => 'CustomerID'));
            return $query->row_array();
    }

    /*public function set_news()
    {
        $this->load->helper('url');
	 $customer_name = $this->input->post('last_name') + $this->input->post('first_name')
        $slug = url_title($customer_name, 'dash', TRUE);

        $data = array(
            'LastName' => $this->input->post('last_name'),
			'FirstName' => $this->input->post('first_name'),
            'slug' => $slug,
            'email' => $this->input->post('email')
        );

        return $this->db->insert('customer', $data);
    }*/
}
