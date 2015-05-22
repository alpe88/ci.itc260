<?php
/**
 * Customer.php - a CI Controller for a generic customer.
 * 
 * Additionaly, it does CRUD within the CI Framework.
 * 
 * @package ITC260
 * @subpackage Customer
 * @author Aleksandar Petrovic <alpe88.junk@gmail.com>
 * @version 1.0 2015/04/30 
 * @link http://www.thisisablankspace.com/ 
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Customer_model.php
 * @see index.php
 * @todo none
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


class Customer extends CI_Controller {
	/**
 	 * Loads default data into object.
	 *
	 * Added in v3 - Result Object
	 * 
 	 * @param none
	 * @return void
	 * @todo none
	 */
	 
        public function __construct(){
                parent::__construct();
                $this->load->model('customer_model');
		  
		  $this->load->view('templates/header');
        }#end constructor()

    	/**
 	 * Shows initial customer database data.
	 *
 	 * @param none
	 * @return void
	 * @todo none
	 */
        public function index(){
                $data['customer'] = $this->customer_model->get_customers();
                $data['title'] = 'List of Customers:';
		  //assigning variables into data array.
                $this->load->view('customer/index', $data);
                $this->load->view('templates/footer');
        }#end of index()  
}#end Customer