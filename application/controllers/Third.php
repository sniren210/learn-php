<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Third extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('pdf');
	}

	public function index()
	{
		 $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'ID',1,0);
        $pdf->Cell(20,6,'NAMA.T',1,0);
        $pdf->Cell(20,6,'NAMA.B',1,0);
        $pdf->Cell(20,6,'NAMA.K',1,0);
        $pdf->Cell(30,6,'PALING SUKAI',1,0);
        $pdf->Cell(40,6,'KURANG SUKAI',1,1);
        $pdf->SetFont('Arial','',10);
        $data = $this->db->get('form')->result();
        foreach ($data as $row){
            $pdf->Cell(10,6,$row->id,1,0);
            $pdf->Cell(20,6,$row->gambar,1,0);
            $pdf->Cell(20,6,$row->nama,1,0);
            $pdf->Cell(20,6,$row->opsi,1,0);
            $pdf->Cell(30,6,$row->nomor,1,0);
            $pdf->Cell(40,6,$row->tanggal,1,1);  
        }
        $pdf->Output();
	}
}