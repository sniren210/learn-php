<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}

	public function Tampilan($tampil,$data = null)
	{
		$this->CI->load->view('header');
		$this->CI->load->view($tampil,$data);
		$this->CI->load->view('footer');
	}
}