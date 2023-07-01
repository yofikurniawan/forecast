<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller 
{
    function __construct()
	{
		parent::__construct();
		check_admin();
    }
    
	public function error_403()
	{
		$this->load->view('kesalahan/error_403');
	}
}