<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fourth extends CI_Controller {
  
  public function index(){
    $this->layout->Tampilan('import');
  }
  
  public function upload(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';

    $config['upload_path'] = realpath('excel');
    $config['allowed_types'] = 'xlsx|xls|csv';
    $config['max_size'] = 10000;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('upload')) {

        //upload gagal
        $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
        //redirect halaman
        redirect(base_url('fourth'));

    } else {

        $data_upload = $this->upload->data();

        $excelreader     = new PHPExcel_Reader_Excel2007();
        $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
        $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

        $data = array();

        $numrow = 1;
        foreach($sheet as $row){
                        if($numrow > 1){
                            array_push($data, array(
                                'gambar' => $row['A'],
                                'keterangan'      => $row['B'],
                                'nama'      => $row['C'],
                                'opsi' =>$row['D'],
                                'nomor' =>$row['E'],
                                'tanggal' =>$row['F']
                            ));
                }
            $numrow++;
        }
        $this->db->insert_batch('form', $data);
        //delete file from server
        unlink(realpath('excel/'.$data_upload['file_name']));

        //upload success
        $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
        //redirect halaman
        redirect(base_url('fourth'));

    }
  }
  

}