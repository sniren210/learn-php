<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Second extends CI_Controller {


	public function index()
	{
		$data['form'] = $this->query->getAll('form');
		$this->layout->tampilan('tabel',$data);
	}

	public function delete()
	{
		$row = $this->input->get('idData');
		$this->query->deleteData('form','id',$row);
		echo $row;
		//redirect('second/Second');
	}

}