<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class First extends CI_Controller {

	public function index()
	{
		// validasi gambar
		$config['upload_path'] 		= 'upload/';
		$config['allowed_types'] 	= 'gif|jpg|png|svg';
		$config['max_size']			= '120000'; // KB	
		//$config['encrypt_name'] = TRUE;//enkripsi nama file
		$nmfile = "file_".time(); 
		$config['file_name'] = $nmfile; 
		$this->load->library('upload',$config);
		// untuk mengecek ada yg sama di database
		// is_unique[produk.nama_produk]

		// validasi form
		$this->form_validation->set_rules('nama','Nama produk','required',
			array(	'required'		=> 'Nama produk harus diisi',));
		$this->form_validation->set_rules('nomor','Stok produk','required',
			array(	'required'		=> 'Stok produk harus diisi'));
		$this->form_validation->set_rules('keterangan','Keterangan produk','required',
			array(	'required'		=> 'Keterangan produk harus diisi'));
		$data = '';
		if ($this->form_validation->run() == false) {
			$this->layout->tampilan('form',$data);

		}else{
			if (!$this->upload->do_upload('gambar')) {
				$this->layout->tampilan('form',$data);
				$this->upload->display_errors();
				echo "gagal";
			}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= 'upload/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= 'upload/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 200; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data =  array(
						'id' => '',
						'gambar' => $upload_data['uploads']['file_name'],
						'keterangan' => $this->input->post('keterangan'),
						'nama' => $this->input->post('nama'),
						'opsi' => $this->input->post('opsi'),
						'nomor' => $this->input->post('nomor'),
						'tanggal' => date('Y-m-d H:i:s')
					);
				$this->db->insert('form',$data);
				// dev post
				// var_dump($this->input->post());
				// dev gambar
				// var_dump($this->upload->data());
			}
		}
	}

	public function hapusimage()
	{
		 $this->db->where('gallery_id',$id);
	     $query = $this->db->get('gallery');
	     $row = $query->row();

	     unlink("./uploads/users/$row->nama_foto");

	     $this->db->delete('gallery', array('gallery_id' => $id));
	}

}
